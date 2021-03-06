@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.testimony.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.testimonies.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.testimony.fields.id') }}
                        </th>
                        <td>
                            {{ $testimony->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.testimony.fields.name') }}
                        </th>
                        <td>
                            {{ $testimony->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.testimony.fields.professionalism') }}
                        </th>
                        <td>
                            {{ $testimony->professionalism }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.testimony.fields.photo') }}
                        </th>
                        <td>
                            <img style="width:70px; height:70px" src="{{ asset($testimony->file ? $testimony->file: 'http://placehold.it/400x400') }}" alt="">

                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.testimony.fields.testimonial_caption') }}
                        </th>
                        <td>
                            {{ $testimony->testimonial_caption }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.testimonies.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
