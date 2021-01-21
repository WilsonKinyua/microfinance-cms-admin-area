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
        $homePageSlide = HomePageSlide::create($request->all());

        if ($request->input('photo', false)) {
            $homePageSlide->addMedia(storage_path('tmp/uploads/' . $request->input('photo')))->toMediaCollection('photo');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $homePageSlide->id]);
        }

        return redirect()->route('admin.home-page-slides.index');
    }

    public function edit(HomePageSlide $homePageSlide)
    {
        abort_if(Gate::denies('home_page_slide_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.homePageSlides.edit', compact('homePageSlide'));
    }

    public function update(UpdateHomePageSlideRequest $request, HomePageSlide $homePageSlide)
    {
        $homePageSlide->update($request->all());

        if ($request->input('photo', false)) {
            if (!$homePageSlide->photo || $request->input('photo') !== $homePageSlide->photo->file_name) {
                if ($homePageSlide->photo) {
                    $homePageSlide->photo->delete();
                }

                $homePageSlide->addMedia(storage_path('tmp/uploads/' . $request->input('photo')))->toMediaCollection('photo');
            }
        } elseif ($homePageSlide->photo) {
            $homePageSlide->photo->delete();
        }

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
