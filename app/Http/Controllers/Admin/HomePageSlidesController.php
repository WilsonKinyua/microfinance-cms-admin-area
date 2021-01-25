<?php

namespace App\Http\Controllers\Admin;

use App\HomePageSlide;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyHomePageSlideRequest;
use App\Http\Requests\StoreHomePageSlideRequest;
use App\Http\Requests\UpdateHomePageSlideRequest;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class HomePageSlidesController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('home_page_slide_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $homePageSlides = HomePageSlide::with(['media'])->get();

        return view('admin.homePageSlides.index', compact('homePageSlides'));
    }

    public function create()
    {
        abort_if(Gate::denies('home_page_slide_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.homePageSlides.create');
    }

    public function store(StoreHomePageSlideRequest $request)
    {

        $data = ([
            "caption"            =>$request->caption,
            "description"       =>$request->description,
        ]);

        if($file = $request->file("photo")) {

            $name = time() . $file->getClientOriginalName();
            $name = $file->move("images/home_page_slides", $name);
            $data['file'] = $name;
        }

        $homePageSlide = HomePageSlide::create($data);

        return redirect()->route('admin.home-page-slides.index');
    }

    public function edit(HomePageSlide $homePageSlide)
    {
        abort_if(Gate::denies('home_page_slide_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.homePageSlides.edit', compact('homePageSlide'));
    }

    public function update(UpdateHomePageSlideRequest $request, HomePageSlide $homePageSlide)
    {


        $data = ([
            "caption"            =>$request->caption,
            "description"       =>$request->description,
        ]);

        if($file = $request->file("photo")) {

            $name = time() . $file->getClientOriginalName();
            $name = $file->move("images/home_page_slides", $name);
            $data['file'] = $name;
        }

        $homePageSlide->update($data);

        return redirect()->route('admin.home-page-slides.index');
    }

    public function show(HomePageSlide $homePageSlide)
    {
        abort_if(Gate::denies('home_page_slide_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.homePageSlides.show', compact('homePageSlide'));
    }

    public function destroy(HomePageSlide $homePageSlide)
    {
        abort_if(Gate::denies('home_page_slide_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $homePageSlide->delete();

        return back();
    }

    public function massDestroy(MassDestroyHomePageSlideRequest $request)
    {
        HomePageSlide::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('home_page_slide_create') && Gate::denies('home_page_slide_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new HomePageSlide();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
