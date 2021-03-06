@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.homePageSlide.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.home-page-slides.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="caption">{{ trans('cruds.homePageSlide.fields.caption') }}</label>
                <input class="form-control {{ $errors->has('caption') ? 'is-invalid' : '' }}" type="text" name="caption" id="caption" value="{{ old('caption', '') }}" required placeholder="Achieve your financial goal">
                @if($errors->has('caption'))
                    <div class="invalid-feedback">
                        {{ $errors->first('caption') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.homePageSlide.fields.caption_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="description">{{ trans('cruds.homePageSlide.fields.description') }}</label>
                <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="description" placeholder="Small Business Loans For Daily Expenses." required>{{ old('description') }}</textarea>
                @if($errors->has('description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.homePageSlide.fields.description_helper') }}</span>
            </div>
            <div class="form-group row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Image:</label>
                        <div class="">
                            <input type="file" name="photo" id="photo" class="form-control">
                        </div>
                    </div>
                </div>
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

@section('scripts')
<script>
    Dropzone.options.photoDropzone = {
    url: '{{ route('admin.home-page-slides.storeMedia') }}',
    maxFilesize: 20, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 20,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="photo"]').remove()
      $('form').append('<input type="hidden" name="photo" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="photo"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($homePageSlide) && $homePageSlide->photo)
      var file = {!! json_encode($homePageSlide->photo) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="photo" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
    error: function (file, response) {
        if ($.type(response) === 'string') {
            var message = response //dropzone sends it's own error messages in string
        } else {
            var message = response.errors.file
        }
        file.previewElement.classList.add('dz-error')
        _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
        _results = []
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i]
            _results.push(node.textContent = message)
        }

        return _results
    }
}
</script>
@endsection
