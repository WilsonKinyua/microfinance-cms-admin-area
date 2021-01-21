<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSocialMediaLinkRequest;
use App\Http\Requests\UpdateSocialMediaLinkRequest;
use App\Http\Resources\Admin\SocialMediaLinkResource;
use App\SocialMediaLink;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SocialMediaLinksApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('social_media_link_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SocialMediaLinkResource(SocialMediaLink::all());
    }

    public function store(StoreSocialMediaLinkRequest $request)
    {
        $socialMediaLink = SocialMediaLink::create($request->all());

        return (new SocialMediaLinkResource($socialMediaLink))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(SocialMediaLink $socialMediaLink)
    {
        abort_if(Gate::denies('social_media_link_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SocialMediaLinkResource($socialMediaLink);
    }

    public function update(UpdateSocialMediaLinkRequest $request, SocialMediaLink $socialMediaLink)
    {
        $socialMediaLink->update($request->all());

        return (new SocialMediaLinkResource($socialMediaLink))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(SocialMediaLink $socialMediaLink)
    {
        abort_if(Gate::denies('social_media_link_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $socialMediaLink->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
