@extends('layouts.admin')
@section('content')
@can('product_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.post.create") }}">
                Thêm bài viết
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        Danh sách bài viết
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable">
                <thead>
                    <tr>

                        <th>
                            Tiêu đề
                        </th>
                        <th>
                            Ảnh
                        </th>
                        <th>
                            Mô tả
                        </th>

                        <th>
                            Từ khóa
                        </th>
                        <th>
                            Thao tác
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($posts as $key => $post)
                        <tr data-entry-id="{{ $post->id }}">

                            <td>
                                {{ $post->title ?? '' }}
                            </td>
                            <td>
                                @if(strlen($post->image ) > 0 )
                                    <img style="height: 100px;width: auto" src="{{url('/upload/post/'.$post->image)}}" alt="{{$post->image}}">

                                @endif

                            </td>
                            <td>
                                {!!$post->description !!}
                            </td>

                            <td >
                                @if($post->status ==1 )
                                    <span class="btn btn-xs btn-success">Đang hiển thị</span>
                                @else
                                    <span class="btn btn-xs btn-danger">Đang ẩn</span>
                                @endif
                            </td>
                            <td>

                                    <a class="btn btn-xs btn-info" href="{{ route('admin.post.edit', $post->id) }}">
                                        Sửa
                                    </a>
                                    <form action="{{ route('admin.post.destroy', $post->id) }}" method="POST" onsubmit="return confirm('Ban có chắc muốn xóa');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="Xóa">
                                    </form>
                                    @if($post->status ==0)
                                    <form action="{{ route('admin.post.showPost', $post->id) }}" method="POST" onsubmit="return confirm('Ban có chắc muốn hiện bài viết này');" style="display: inline-block;">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="hidden" name="id" value="{{ $post->id }}">
                                        <input type="submit" class="btn btn-xs btn-success" value="Hiện">
                                    </form>
                                    @else
                                    <form action="{{ route('admin.post.hide', $post->id) }}" method="POST" onsubmit="return confirm('Ban có chắc muốn ẩn bài viết này');" style="display: inline-block;">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="hidden" name="id" value="{{ $post->id }}">
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
