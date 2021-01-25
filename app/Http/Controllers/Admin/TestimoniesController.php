<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyTestimonyRequest;
use App\Http\Requests\StoreTestimonyRequest;
use App\Http\Requests\UpdateTestimonyRequest;
use App\Testimony;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class TestimoniesController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('testimony_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $testimonies = Testimony::with(['media'])->get();

        return view('admin.testimonies.index', compact('testimonies'));
    }

    public function create()
    {
        abort_if(Gate::denies('testimony_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.testimonies.create');
    }

    public function store(StoreTestimonyRequest $request)
    {
        $data = ([
            "name"                  =>$request->name,
            "professionalism"       =>$request->professionalism,
            "testimonial_caption"   =>$request->testimonial_caption,
        ]);

        if($file = $request->file("photo")) {

            $name = time() . $file->getClientOriginalName();
            $name = $file->move("images/testimonies", $name);
            $data['file'] = $name;
        }

        $testimony = Testimony::create($data);

        return redirect()->route('admin.testimonies.index');
    }

    public function edit(Testimony $testimony)
    {
        abort_if(Gate::denies('testimony_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.testimonies.edit', compact('testimony'));
    }

    public function update(UpdateTestimonyRequest $request, Testimony $testimony)
    {
        $data = ([
            "name"                  =>$request->name,
            "professionalism"       =>$request->professionalism,
            "testimonial_caption"   =>$request->testimonial_caption,
        ]);

        if($file = $request->file("photo")) {

            $name = time() . $file->getClientOriginalName();
            $name = $file->move("images/testimonies", $name);
            $data['file'] = $name;
        }

        $testimony->update($data);
        return redirect()->route('admin.testimonies.index');
    }

    public function show(Testimony $testimony)
    {
        abort_if(Gate::denies('testimony_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.testimonies.show', compact('testimony'));
    }

    public function destroy(Testimony $testimony)
    {
        abort_if(Gate::denies('testimony_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $testimony->delete();

        return back();
    }

    public function massDestroy(MassDestroyTestimonyRequest $request)
    {
        Testimony::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('testimony_create') && Gate::denies('testimony_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Testimony();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
