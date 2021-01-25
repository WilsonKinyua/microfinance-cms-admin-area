@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.whyChooseOurCompany.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.why-choose-our-companies.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.whyChooseOurCompany.fields.id') }}
                        </th>
                        <td>
                            {{ $whyChooseOurCompany->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.whyChooseOurCompany.fields.title') }}
                        </th>
                        <td>
                            {{ $whyChooseOurCompany->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.whyChooseOurCompany.fields.description') }}
                        </th>
                        <td>
                            {!! $whyChooseOurCompany->description !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.whyChooseOurCompany.fields.photo') }}
                        </th>
                        <td>
                            <img style="width:70px; height:70px" src="{{ asset($whyChooseOurCompany->file ? $whyChooseOurCompany->file: 'http://placehold.it/400x400') }}" alt="">

                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.why-choose-our-companies.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
