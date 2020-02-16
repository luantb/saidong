@extends('layouts.admin')
@section('content')
@can('product_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.landingPage.create") }}">
                Thêm panel mới
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        Danh sách Panel
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable">
                <thead>
                    <tr>
                        <th>
                            ID
                        </th>

                        <th>
                            Tiêu đề
                        </th>
                        <th>
                            Tên menu
                        </th>
                        <th>
                            Loại panel
                        </th>

                        <th>
                            Vị trí hiển thi
                        </th>
                        <th>
                            Thứ tự hiển thị
                        </th>
                        <th>
                            Trạng thái
                        </th>
                        <th>
                            Thao tác
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($panels as $key => $panel)
                        <tr data-entry-id="{{ $panel->id }}">
                            <td>
                                {{ $panel->id }}
                            </td>
                            <td>
                                {{ $panel->title ?? '' }}
                            </td>
                            <td>
                                {{ $panel->menu_name  ?? '' }}
                            </td>
                            <td>
                                @if($panel->position ==1 )
                                    <span class="btn btn-xs ">ảnh ( trái ) - chữ ( phải )</span>
                                @elseif($panel->position ==2 )
                                    <span class="btn btn-xs ">Chữ( trái ) - ảnh ( phải )</span>
                                @elseif($panel->position ==3 )
                                    <span class="btn btn-xs ">Chỉ chữ</span>
                                @elseif($panel->position ==4 )
                                    <span class="btn btn-xs ">Chữ ( trái ) - form ( phải )</span>
                                @else
                                    <span class="btn btn-xs ">Chính giữa</span>
                                @endif
                            </td>
                            <td>
                                @if($panel->type ==1 )
                                    <span class="btn btn-xs ">Nội dung bằng chữ hoặc hình ảnh</span>
                                @elseif($panel->type ==2 )
                                    <span class="btn btn-xs ">Danh sách 4 tin tức</span>
                                @elseif($panel->type ==3 )
                                    <span class="btn btn-xs ">Danh sách 3 sản phẩm</span>
                                @elseif($panel->type ==4 )
                                    <span class="btn btn-xs ">Form nhận yêu cầu của khách hàng</span>
                                @endif
                            </td>
                            <td>
                                {{ $panel->order_number ?? '' }}
                            </td>

                            <td >
                                @if($panel->status ==1 )
                                    <span class="btn btn-xs btn-success">Đang hiển thị</span>
                                @else
                                    <span class="btn btn-xs btn-danger">Đang ẩn</span>
                                @endif
                            </td>
                            <td>

                                    <a class="btn btn-xs btn-info" href="{{ route('admin.landingPage.edit', $panel->id) }}">
                                        Sửa
                                    </a>
                                    <form action="{{ route('admin.test.destroy', $panel->id) }}" method="POST" onsubmit="return confirm('Ban có chắc muốn xóa');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="id" value="{{$panel->id}}">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="Xóa">
                                    </form>
                                    @if($panel->status ==0)
                                    <form action="{{ route('admin.post.showPost', $panel->id) }}" method="POST" onsubmit="return confirm('Ban có chắc muốn hiện bài viết này');" style="display: inline-block;">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="hidden" name="id" value="{{ $panel->id }}">
                                        <input type="submit" class="btn btn-xs btn-success" value="Hiện">
                                    </form>
                                    @else
                                    <form action="{{ route('admin.post.hide', $panel->id) }}" method="POST" onsubmit="return confirm('Ban có chắc muốn ẩn bài viết này');" style="display: inline-block;">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="hidden" name="id" value="{{ $panel->id }}">
                                        <input type="submit" class="btn btn-xs btn-warning" value="Ẩn">
                                    </form>
                                     @endif
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
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('product_delete')
  dtButtons.push(deleteButton)
@endcan

  $('.datatable:not(.ajaxTable)').DataTable({ buttons: dtButtons })
})

</script>
@endsection
@endsection
