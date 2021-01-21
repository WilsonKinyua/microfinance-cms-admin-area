<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroySocialMediaLinkRequest;
use App\Http\Requests\StoreSocialMediaLinkRequest;
use App\Http\Requests\UpdateSocialMediaLinkRequest;
use App\SocialMediaLink;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SocialMediaLinksController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('social_media_link_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $socialMediaLinks = SocialMediaLink::all();

        return view('admin.socialMediaLinks.index', compact('socialMediaLinks'));
    }

    public function create()
    {
        abort_if(Gate::denies('social_media_link_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.socialMediaLinks.create');
    }

    public function store(StoreSocialMediaLinkRequest $request)
    {
        $socialMediaLink = SocialMediaLink::create($request->all());

        return redirect()->route('admin.social-media-links.index');
    }

    public function edit(SocialMediaLink $socialMediaLink)
    {
        abort_if(Gate::denies('social_media_link_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.socialMediaLinks.edit', compact('socialMediaLink'));
    }

    public function update(UpdateSocialMediaLinkRequest $request, SocialMediaLink $socialMediaLink)
    {
        $socialMediaLink->update($request->all());

        return redirect()->route('admin.social-media-links.index');
    }

    public function show(SocialMediaLink $socialMediaLink)
    {
        abort_if(Gate::denies('social_media_link_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.socialMediaLinks.show', compact('socialMediaLink'));
    }

    public function destroy(SocialMediaLink $socialMediaLink)
    {
        abort_if(Gate::denies('social_media_link_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $socialMediaLink->delete();

        return back();
    }

    public function massDestroy(MassDestroySocialMediaLinkRequest $request)
    {
        SocialMediaLink::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
