@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.testimony.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.testimonies.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.testimony.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" placeholder="John Doe" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.testimony.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="professionalism">{{ trans('cruds.testimony.fields.professionalism') }}</label>
                <input class="form-control {{ $errors->has('professionalism') ? 'is-invalid' : '' }}" type="text" name="professionalism" id="professionalism" value="{{ old('professionalism', '') }}" placeholder="Co Founder">
                @if($errors->has('professionalism'))
                    <div class="invalid-feedback">
                        {{ $errors->first('professionalism') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.testimony.fields.professionalism_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="testimonial_caption">Testimonial (caption)</label>
                <textarea class="form-control {{ $errors->has('testimonial_caption') ? 'is-invalid' : '' }}" name="testimonial_caption" id="testimonial_caption" placeholder="Logisti Group is a representative...">{{ old('testimonial_caption') }}</textarea>
                @if($errors->has('testimonial_caption'))
                    <div class="invalid-feedback">
                        {{ $errors->first('testimonial_caption') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.testimony.fields.testimonial_caption_helper') }}</span>
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
    url: '{{ route('admin.testimonies.storeMedia') }}',
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
@if(isset($testimony) && $testimony->photo)
      var file = {!! json_encode($testimony->photo) !!}
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
