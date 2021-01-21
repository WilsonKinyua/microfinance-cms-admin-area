<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyWhyChooseOurCompanyRequest;
use App\Http\Requests\StoreWhyChooseOurCompanyRequest;
use App\Http\Requests\UpdateWhyChooseOurCompanyRequest;
use App\WhyChooseOurCompany;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class WhyChooseOurCompanyController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('why_choose_our_company_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $whyChooseOurCompanies = WhyChooseOurCompany::with(['media'])->get();

        return view('admin.whyChooseOurCompanies.index', compact('whyChooseOurCompanies'));
    }

    public function create()
    {
        abort_if(Gate::denies('why_choose_our_company_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.whyChooseOurCompanies.create');
    }

    public function store(StoreWhyChooseOurCompanyRequest $request)
    {
        $whyChooseOurCompany = WhyChooseOurCompany::create($request->all());

        if ($request->input('photo', false)) {
            $whyChooseOurCompany->addMedia(storage_path('tmp/uploads/' . $request->input('photo')))->toMediaCollection('photo');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $whyChooseOurCompany->id]);
        }

        return redirect()->route('admin.why-choose-our-companies.index');
    }

    public function edit(WhyChooseOurCompany $whyChooseOurCompany)
    {
        abort_if(Gate::denies('why_choose_our_company_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.whyChooseOurCompanies.edit', compact('whyChooseOurCompany'));
    }

    public function update(UpdateWhyChooseOurCompanyRequest $request, WhyChooseOurCompany $whyChooseOurCompany)
    {
        $whyChooseOurCompany->update($request->all());

        if ($request->input('photo', false)) {
            if (!$whyChooseOurCompany->photo || $request->input('photo') !== $whyChooseOurCompany->photo->file_name) {
                if ($whyChooseOurCompany->photo) {
                    $whyChooseOurCompany->photo->delete();
                }

                $whyChooseOurCompany->addMedia(storage_path('tmp/uploads/' . $request->input('photo')))->toMediaCollection('photo');
            }
        } elseif ($whyChooseOurCompany->photo) {
            $whyChooseOurCompany->photo->delete();
        }

        return redirect()->route('admin.why-choose-our-companies.index');
    }

    public function show(WhyChooseOurCompany $whyChooseOurCompany)
    {
        abort_if(Gate::denies('why_choose_our_company_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.whyChooseOurCompanies.show', compact('whyChooseOurCompany'));
    }

    public function destroy(WhyChooseOurCompany $whyChooseOurCompany)
    {
        abort_if(Gate::denies('why_choose_our_company_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $whyChooseOurCompany->delete();

        return back();
    }

    public function massDestroy(MassDestroyWhyChooseOurCompanyRequest $request)
    {
        WhyChooseOurCompany::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('why_choose_our_company_create') && Gate::denies('why_choose_our_company_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new WhyChooseOurCompany();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
