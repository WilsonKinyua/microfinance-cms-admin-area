@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.homePageSlide.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.home-page-slides.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.homePageSlide.fields.id') }}
                        </th>
                        <td>
                            {{ $homePageSlide->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.homePageSlide.fields.caption') }}
                        </th>
                        <td>
                            {{ $homePageSlide->caption }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.homePageSlide.fields.description') }}
                        </th>
                        <td>
                            {!! $homePageSlide->description !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.homePageSlide.fields.slide_image') }}
                        </th>
                        <td>
                            @if($homePageSlide->slide_image)
                                <a href="{{ $homePageSlide->slide_image->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $homePageSlide->slide_image->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.home-page-slides.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection