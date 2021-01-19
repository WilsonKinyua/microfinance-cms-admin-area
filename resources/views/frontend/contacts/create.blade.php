@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.contact.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.contacts.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label for="street_name">{{ trans('cruds.contact.fields.street_name') }}</label>
                            <input class="form-control" type="text" name="street_name" id="street_name" value="{{ old('street_name', '') }}">
                            @if($errors->has('street_name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('street_name') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.contact.fields.street_name_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="phone">{{ trans('cruds.contact.fields.phone') }}</label>
                            <input class="form-control" type="number" name="phone" id="phone" value="{{ old('phone', '') }}" step="1">
                            @if($errors->has('phone'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('phone') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.contact.fields.phone_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="open_time">{{ trans('cruds.contact.fields.open_time') }}</label>
                            <input class="form-control" type="text" name="open_time" id="open_time" value="{{ old('open_time', '') }}">
                            @if($errors->has('open_time'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('open_time') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.contact.fields.open_time_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="email">{{ trans('cruds.contact.fields.email') }}</label>
                            <input class="form-control" type="email" name="email" id="email" value="{{ old('email') }}">
                            @if($errors->has('email'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('email') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.contact.fields.email_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger" type="submit">
                                {{ trans('global.save') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection