@extends('layouts.admin')
@section('content')
@can('testimony_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.testimonies.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.testimony.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.testimony.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Testimony">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.testimony.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.testimony.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.testimony.fields.professionalism') }}
                        </th>
                        <th>
                            {{ trans('cruds.testimony.fields.photo') }}
                        </th>
                        <th>
                            {{ trans('cruds.testimony.fields.testimonial_caption') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($testimonies as $key => $testimony)
                        <tr data-entry-id="{{ $testimony->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $testimony->id ?? '' }}
                            </td>
                            <td>
                                {{ $testimony->name ?? '' }}
                            </td>
                            <td>
                                {{ $testimony->professionalism ?? '' }}
                            </td>
                            <td>
                                @if($testimony->photo)
                                    <a href="{{ $testimony->photo->getUrl() }}" target="_blank" style="display: inline-block">
                                        <img src="{{ $testimony->photo->getUrl('thumb') }}">
                                    </a>
                                @endif
                            </td>
                            <td>
                                {{ $testimony->testimonial_caption ?? '' }}
                            </td>
                            <td>
                                @can('testimony_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.testimonies.show', $testimony->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('testimony_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.testimonies.edit', $testimony->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('testimony_delete')
                                    <form action="{{ route('admin.testimonies.destroy', $testimony->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('testimony_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.testimonies.massDestroy') }}",
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
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-Testimony:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection