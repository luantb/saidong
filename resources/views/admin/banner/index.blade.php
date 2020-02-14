@extends('layouts.admin')
@section('content')
@can('product_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.banner.create") }}">
                Thêm Banner
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        Danh sách Banner
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            Tên
                        </th>
                        <th>
                            Ảnh
                        </th>


                        <th>
                            Hiển thị
                        </th>
                        <th>
                            Thao tác
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($banners as $key => $banner)
                        <tr data-entry-id="{{ $banner->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $banner->title ?? '' }}
                            </td>
                            <td>
                                @if(strlen($banner->image ) > 0 )
                                    <img style="height: 100px;width: auto" src="{{url('/upload/banner/'.$banner->image)}}" alt="{{$banner->image}}">

                                @endif
                            </td>

                            <td >
                                @if($banner->status ==1 )
                                    <span class="btn btn-xs btn-success">Đang hiển thị</span>
                                @else
                                    <span class="btn btn-xs btn-danger">Đang ẩn</span>
                                 @endif
                            </td>
                            <td>
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.banner.edit', $banner->id) }}">
                                        Sửa
                                    </a>
                                    <form action="{{ route('admin.banner.destroy', $banner->id) }}" method="POST" onsubmit="return confirm('Bạn có chắc muốn xóa');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="Xóa">
                                    </form>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@section('scripts')
@parent
<script>
    $(function () {
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.products.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('Bạn có chắc muốn xóa')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('product_delete')
  dtButtons.push(deleteButton)
@endcan

  $('.datatable:not(.ajaxTable)').DataTable({ buttons: dtButtons })
})

</script>
@endsection
@endsection
