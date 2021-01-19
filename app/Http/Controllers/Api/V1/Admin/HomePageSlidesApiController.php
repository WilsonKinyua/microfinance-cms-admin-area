<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\HomePageSlide;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreHomePageSlideRequest;
use App\Http\Requests\UpdateHomePageSlideRequest;
use App\Http\Resources\Admin\HomePageSlideResource;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class HomePageSlidesApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('home_page_slide_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new HomePageSlideResource(HomePageSlide::all());
    }

    public function store(StoreHomePageSlideRequest $request)
    {
        $homePageSlide = HomePageSlide::create($request->all());

        if ($request->input('slide_image', false)) {
            $homePageSlide->addMedia(storage_path('tmp/uploads/' . $request->input('slide_image')))->toMediaCollection('slide_image');
        }

        return (new HomePageSlideResource($homePageSlide))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(HomePageSlide $homePageSlide)
    {
        abort_if(Gate::denies('home_page_slide_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new HomePageSlideResource($homePageSlide);
    }

    public function update(UpdateHomePageSlideRequest $request, HomePageSlide $homePageSlide)
    {
        $homePageSlide->update($request->all());

        if ($request->input('slide_image', false)) {
            if (!$homePageSlide->slide_image || $request->input('slide_image') !== $homePageSlide->slide_image->file_name) {
                if ($homePageSlide->slide_image) {
                    $homePageSlide->slide_image->delete();
                }

                $homePageSlide->addMedia(storage_path('tmp/uploads/' . $request->input('slide_image')))->toMediaCollection('slide_image');
            }
        } elseif ($homePageSlide->slide_image) {
            $homePageSlide->slide_image->delete();
        }

        return (new HomePageSlideResource($homePageSlide))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(HomePageSlide $homePageSlide)
    {
        abort_if(Gate::denies('home_page_slide_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $homePageSlide->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
