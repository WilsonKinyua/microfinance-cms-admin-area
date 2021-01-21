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
        $aboutOurCompany = AboutOurCompany::create($request->all());

        if ($request->input('photo', false)) {
            $aboutOurCompany->addMedia(storage_path('tmp/uploads/' . $request->input('photo')))->toMediaCollection('photo');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $aboutOurCompany->id]);
        }

        return redirect()->route('admin.about-our-companies.index');
    }

    public function edit(AboutOurCompany $aboutOurCompany)
    {
        abort_if(Gate::denies('about_our_company_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.aboutOurCompanies.edit', compact('aboutOurCompany'));
    }

    public function update(UpdateAboutOurCompanyRequest $request, AboutOurCompany $aboutOurCompany)
    {
        $aboutOurCompany->update($request->all());

        if ($request->input('photo', false)) {
            if (!$aboutOurCompany->photo || $request->input('photo') !== $aboutOurCompany->photo->file_name) {
                if ($aboutOurCompany->photo) {
                    $aboutOurCompany->photo->delete();
                }

                $aboutOurCompany->addMedia(storage_path('tmp/uploads/' . $request->input('photo')))->toMediaCollection('photo');
            }
        } elseif ($aboutOurCompany->photo) {
            $aboutOurCompany->photo->delete();
        }

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
