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

        $data = ([
            "title"            =>$request->title,
            "description"       =>$request->description,
        ]);

        if($file = $request->file("photo")) {

            $name = time() . $file->getClientOriginalName();
            $name = $file->move("images/about", $name);
            $data['file'] = $name;
        }

        $whyChooseOurCompany = WhyChooseOurCompany::create($data);

        return redirect()->route('admin.why-choose-our-companies.index');
    }

    public function edit(WhyChooseOurCompany $whyChooseOurCompany)
    {
        abort_if(Gate::denies('why_choose_our_company_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.whyChooseOurCompanies.edit', compact('whyChooseOurCompany'));
    }

    public function update(UpdateWhyChooseOurCompanyRequest $request, WhyChooseOurCompany $whyChooseOurCompany)
    {
        $data = ([
            "title"            =>$request->title,
            "description"       =>$request->description,
        ]);

        if($file = $request->file("photo")) {

            $name = time() . $file->getClientOriginalName();
            $name = $file->move("images/about", $name);
            $data['file'] = $name;
        }

        $whyChooseOurCompany->update($data);

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
