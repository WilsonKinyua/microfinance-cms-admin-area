@extends('layouts.admin')
@section('content')
@can('team_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.teams.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.team.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.team.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Team">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.team.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.team.fields.full_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.team.fields.professionalism') }}
                        </th>
                        <th>
                            {{ trans('cruds.team.fields.facebook') }}
                        </th>
                        <th>
                            {{ trans('cruds.team.fields.twitter') }}
                        </th>
                        <th>
                            {{ trans('cruds.team.fields.website') }}
                        </th>
                        <th>
                            {{ trans('cruds.team.fields.instagram') }}
                        </th>
                        <th>
                            {{ trans('cruds.team.fields.email') }}
                        </th>
                        <th>
                            Photo
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                    <tr>
                        <td>
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            {{-- <input class="search" type="text" placeholder="{{ trans('global.search') }}"> --}}
                        </td>
                        <td>
                        </td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($teams as $key => $team)
                        <tr data-entry-id="{{ $team->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $team->id ?? '' }}
                            </td>
                            <td>
                                {{ $team->full_name ?? '' }}
                            </td>
                            <td>
                                {{ $team->professionalism ?? '' }}
                            </td>
                            <td>
                                <a href="https://www.facebook.com/{{ $team->facebook ?? '' }}" target="_blank" rel="noopener noreferrer">{{ $team->facebook ?? '' }}</a>
                            </td>
                            <td>
                                <a href="https://twitter.com/{{ $team->twitter ?? '' }}" target="_blank" rel="noopener noreferrer">{{ $team->twitter ?? '' }}</a>
                            </td>
                            <td>
                                <a href="{{ $team->website ?? '' }} " target="_blank" rel="noopener noreferrer">{{ $team->website ?? '' }}</a>
                            </td>
                            <td>
                                <a href="http://instagram.com/ {{ $team->instagram ?? '' }}" target="_blank" rel="noopener noreferrer"> {{ $team->instagram ?? '' }}</a>
                            </td>

                            <td>
                                <a href="mailto:{{ $team->email ?? '' }}">{{ $team->email ?? '' }}</a>
                            </td>

                            <td>
                                <img style="width:40px; height:40px" src="{{ asset($team->file ? $team->file: 'http://placehold.it/400x400') }}" alt="">
                            </td>

                            <td>
                                @can('team_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.teams.show', $team->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('team_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.teams.edit', $team->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('team_delete')
                                    <form action="{{ route('admin.teams.destroy', $team->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('team_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.teams.massDestroy') }}",
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
  let table = $('.datatable-Team:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });

let visibleColumnsIndexes = null;
$('.datatable thead').on('input', '.search', function () {
      let strict = $(this).attr('strict') || false
      let value = strict && this.value ? "^" + this.value + "$" : this.value

      let index = $(this).parent().index()
      if (visibleColumnsIndexes !== null) {
        index = visibleColumnsIndexes[index]
      }

      table
        .column(index)
        .search(value, strict)
        .draw()
  });
table.on('column-visibility.dt', function(e, settings, column, state) {
      visibleColumnsIndexes = []
      table.columns(":visible").every(function(colIdx) {
          visibleColumnsIndexes.push(colIdx);
      });
  })
})

</script>
@endsection
