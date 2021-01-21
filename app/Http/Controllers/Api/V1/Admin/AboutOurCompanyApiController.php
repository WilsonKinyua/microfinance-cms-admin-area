<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\AboutOurCompany;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreAboutOurCompanyRequest;
use App\Http\Requests\UpdateAboutOurCompanyRequest;
use App\Http\Resources\Admin\AboutOurCompanyResource;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AboutOurCompanyApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('about_our_company_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AboutOurCompanyResource(AboutOurCompany::all());
    }

    public function store(StoreAboutOurCompanyRequest $request)
    {
        $aboutOurCompany = AboutOurCompany::create($request->all());

        if ($request->input('photo', false)) {
            $aboutOurCompany->addMedia(storage_path('tmp/uploads/' . $request->input('photo')))->toMediaCollection('photo');
        }

        return (new AboutOurCompanyResource($aboutOurCompany))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(AboutOurCompany $aboutOurCompany)
    {
        abort_if(Gate::denies('about_our_company_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AboutOurCompanyResource($aboutOurCompany);
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

        return (new AboutOurCompanyResource($aboutOurCompany))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(AboutOurCompany $aboutOurCompany)
    {
        abort_if(Gate::denies('about_our_company_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $aboutOurCompany->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
