@extends('layouts.admin')
@section('content')
@can('home_page_slide_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.home-page-slides.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.homePageSlide.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.homePageSlide.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-HomePageSlide">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.homePageSlide.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.homePageSlide.fields.caption') }}
                        </th>
                        <th>
                            {{ trans('cruds.homePageSlide.fields.description') }}
                        </th>
                        <th>
                            {{ trans('cruds.homePageSlide.fields.photo') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($homePageSlides as $key => $homePageSlide)
                        <tr data-entry-id="{{ $homePageSlide->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $homePageSlide->id ?? '' }}
                            </td>
                            <td>
                                {{ $homePageSlide->caption ?? '' }}
                            </td>
                            <td>
                                {{ $homePageSlide->description ?? '' }}
                            </td>
                            <td>
                                <img style="width:60px; height:40px" src="{{ asset($homePageSlide->file ? $homePageSlide->file: 'http://placehold.it/400x400') }}" alt="">
                            </td>
                            <td>

                                @can('home_page_slide_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.home-page-slides.show', $homePageSlide->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('home_page_slide_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.home-page-slides.edit', $homePageSlide->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('home_page_slide_delete')
                                    <form action="{{ route('admin.home-page-slides.destroy', $homePageSlide->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('home_page_slide_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.home-page-slides.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'asc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-HomePageSlide:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });

})

</script>
@endsection
