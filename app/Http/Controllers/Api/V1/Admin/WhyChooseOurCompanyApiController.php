<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreWhyChooseOurCompanyRequest;
use App\Http\Requests\UpdateWhyChooseOurCompanyRequest;
use App\Http\Resources\Admin\WhyChooseOurCompanyResource;
use App\WhyChooseOurCompany;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class WhyChooseOurCompanyApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('why_choose_our_company_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new WhyChooseOurCompanyResource(WhyChooseOurCompany::all());
    }

    public function store(StoreWhyChooseOurCompanyRequest $request)
    {
        $whyChooseOurCompany = WhyChooseOurCompany::create($request->all());

        if ($request->input('photo', false)) {
            $whyChooseOurCompany->addMedia(storage_path('tmp/uploads/' . $request->input('photo')))->toMediaCollection('photo');
        }

        return (new WhyChooseOurCompanyResource($whyChooseOurCompany))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(WhyChooseOurCompany $whyChooseOurCompany)
    {
        abort_if(Gate::denies('why_choose_our_company_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new WhyChooseOurCompanyResource($whyChooseOurCompany);
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

        return (new WhyChooseOurCompanyResource($whyChooseOurCompany))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(WhyChooseOurCompany $whyChooseOurCompany)
    {
        abort_if(Gate::denies('why_choose_our_company_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $whyChooseOurCompany->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
