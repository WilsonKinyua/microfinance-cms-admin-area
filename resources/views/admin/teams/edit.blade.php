@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.team.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.teams.update", [$team->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="full_name">{{ trans('cruds.team.fields.full_name') }}</label>
                <input class="form-control {{ $errors->has('full_name') ? 'is-invalid' : '' }}" type="text" name="full_name" id="full_name" value="{{ old('full_name', $team->full_name) }}" required>
                @if($errors->has('full_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('full_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.team.fields.full_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="professionalism">{{ trans('cruds.team.fields.professionalism') }}</label>
                <input class="form-control {{ $errors->has('professionalism') ? 'is-invalid' : '' }}" type="text" name="professionalism" id="professionalism" value="{{ old('professionalism', $team->professionalism) }}" required>
                @if($errors->has('professionalism'))
                    <div class="invalid-feedback">
                        {{ $errors->first('professionalism') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.team.fields.professionalism_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="facebook">{{ trans('cruds.team.fields.facebook') }}</label>
                <input class="form-control {{ $errors->has('facebook') ? 'is-invalid' : '' }}" type="text" name="facebook" id="facebook" value="{{ old('facebook', $team->facebook) }}">
                @if($errors->has('facebook'))
                    <div class="invalid-feedback">
                        {{ $errors->first('facebook') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.team.fields.facebook_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="twitter">{{ trans('cruds.team.fields.twitter') }}</label>
                <input class="form-control {{ $errors->has('twitter') ? 'is-invalid' : '' }}" type="text" name="twitter" id="twitter" value="{{ old('twitter', $team->twitter) }}">
                @if($errors->has('twitter'))
                    <div class="invalid-feedback">
                        {{ $errors->first('twitter') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.team.fields.twitter_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="website">{{ trans('cruds.team.fields.website') }}</label>
                <input class="form-control {{ $errors->has('website') ? 'is-invalid' : '' }}" type="text" name="website" id="website" value="{{ old('website', $team->website) }}">
                @if($errors->has('website'))
                    <div class="invalid-feedback">
                        {{ $errors->first('website') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.team.fields.website_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="instagram">{{ trans('cruds.team.fields.instagram') }}</label>
                <input class="form-control {{ $errors->has('instagram') ? 'is-invalid' : '' }}" type="text" name="instagram" id="instagram" value="{{ old('instagram', $team->instagram) }}">
                @if($errors->has('instagram'))
                    <div class="invalid-feedback">
                        {{ $errors->first('instagram') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.team.fields.instagram_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="email">{{ trans('cruds.team.fields.email') }}</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email" id="email" value="{{ old('email', $team->email) }}">
                @if($errors->has('email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.team.fields.email_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection