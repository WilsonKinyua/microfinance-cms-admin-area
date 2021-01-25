@extends('layouts.admin')
@section('content')
@can('about_our_company_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.about-our-companies.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.aboutOurCompany.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.aboutOurCompany.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-AboutOurCompany">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.aboutOurCompany.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.aboutOurCompany.fields.title') }}
                        </th>
                        <th>
                            {{ trans('cruds.aboutOurCompany.fields.photo') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($aboutOurCompanies as $key => $aboutOurCompany)
                        <tr data-entry-id="{{ $aboutOurCompany->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $aboutOurCompany->id ?? '' }}
                            </td>
                            <td>
                                {{ $aboutOurCompany->title ?? '' }}
                            </td>
                            <td>
                                <img style="width:60px; height:60px" src="{{ asset($aboutOurCompany->file ? $aboutOurCompany->file: 'http://placehold.it/400x400') }}" alt="">

                            </td>
                            <td>
                                @can('about_our_company_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.about-our-companies.show', $aboutOurCompany->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('about_our_company_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.about-our-companies.edit', $aboutOurCompany->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('about_our_company_delete')
                                    <form action="{{ route('admin.about-our-companies.destroy', $aboutOurCompany->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('about_our_company_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.about-our-companies.massDestroy') }}",
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
  let table = $('.datatable-AboutOurCompany:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });

})

</script>
@endsection
