@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.aboutOurCompany.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.about-our-companies.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.aboutOurCompany.fields.id') }}
                        </th>
                        <td>
                            {{ $aboutOurCompany->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.aboutOurCompany.fields.title') }}
                        </th>
                        <td>
                            {{ $aboutOurCompany->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.aboutOurCompany.fields.description') }}
                        </th>
                        <td>
                            {!! $aboutOurCompany->description !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.aboutOurCompany.fields.photo') }}
                        </th>
                        <td>
                            <img style="width:60px; height:60px" src="{{ asset($aboutOurCompany->file ? $aboutOurCompany->file: 'http://placehold.it/400x400') }}" alt="">
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.about-our-companies.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
