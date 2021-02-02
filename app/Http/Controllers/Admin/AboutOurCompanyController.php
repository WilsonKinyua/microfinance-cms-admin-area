<?php

namespace App\Http\Controllers\Admin;

use App\AboutOurCompany;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyAboutOurCompanyRequest;
use App\Http\Requests\StoreAboutOurCompanyRequest;
use App\Http\Requests\UpdateAboutOurCompanyRequest;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class AboutOurCompanyController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('about_our_company_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $aboutOurCompanies = AboutOurCompany::with(['media'])->get();

        return view('admin.aboutOurCompanies.index', compact('aboutOurCompanies'));
    }

    public function create()
    {
        abort_if(Gate::denies('about_our_company_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.aboutOurCompanies.create');
    }

    public function store(StoreAboutOurCompanyRequest $request)
    {


        $data = ([
            // "title"            =>$request->title,
            "description"       =>$request->description,
            "vision"            =>$request->vision,
            "mission"           =>$request->mission,
            "ourgoals"          =>$request->ourgoals,
        ]);

        if($file = $request->file("photo")) {

            $name = time() . $file->getClientOriginalName();
            $name = $file->move("images/about", $name);
            $data['file'] = $name;

        }

        $aboutOurCompany = AboutOurCompany::create($data);

        return redirect()->route('admin.about-our-companies.index');
    }

    public function edit(AboutOurCompany $aboutOurCompany)
    {
        abort_if(Gate::denies('about_our_company_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.aboutOurCompanies.edit', compact('aboutOurCompany'));
    }

    public function update(UpdateAboutOurCompanyRequest $request, AboutOurCompany $aboutOurCompany)
    {


        $data = ([
            // "title"            =>$request->title,
            "description"       =>$request->description,
            "vision"            =>$request->vision,
            "mission"           =>$request->mission,
            "ourgoals"          =>$request->ourgoals,
        ]);

        if($file = $request->file("photo")) {

            $name = time() . $file->getClientOriginalName();
            $name = $file->move("images/about", $name);
            $data['file'] = $name;

        }

        $aboutOurCompany->update($data);

        return redirect()->route('admin.about-our-companies.index');
    }

    public function show(AboutOurCompany $aboutOurCompany)
    {
        abort_if(Gate::denies('about_our_company_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.aboutOurCompanies.show', compact('aboutOurCompany'));
    }

    public function destroy(AboutOurCompany $aboutOurCompany)
    {
        abort_if(Gate::denies('about_our_company_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $aboutOurCompany->delete();

        return back();
    }

    public function massDestroy(MassDestroyAboutOurCompanyRequest $request)
    {
        AboutOurCompany::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('about_our_company_create') && Gate::denies('about_our_company_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new AboutOurCompany();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
