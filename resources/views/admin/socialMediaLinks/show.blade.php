@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.socialMediaLink.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.social-media-links.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.socialMediaLink.fields.id') }}
                        </th>
                        <td>
                            {{ $socialMediaLink->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.socialMediaLink.fields.facebook') }}
                        </th>
                        <td>
                            {{ $socialMediaLink->facebook }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.socialMediaLink.fields.instagram') }}
                        </th>
                        <td>
                            {{ $socialMediaLink->instagram }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.socialMediaLink.fields.phone') }}
                        </th>
                        <td>
                            {{ $socialMediaLink->phone }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.socialMediaLink.fields.email') }}
                        </th>
                        <td>
                            {{ $socialMediaLink->email }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.social-media-links.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection