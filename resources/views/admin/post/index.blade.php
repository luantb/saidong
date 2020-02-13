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
                        <th width="10">

                        </th>
                        <th>
                            Tiêu đề
                        </th>
                        <th>
                            Mô tả
                        </th>
                        <th>
                            Từ khóa
                        </th>
                        <th>
                            &nbsp;Ngày tạo
                        </th>
                        <th>
                            Ngày cập nhật
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
                    @foreach($posts as $key => $post)
                        <tr data-entry-id="{{ $post->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $post->title ?? '' }}
                            </td>
                            <td>
                                {{ $post->description ?? '' }}
                            </td>
                            <td>
                                {{ $post->content ?? '' }}
                            </td>
                            <td>
                                {{ $post->created_at ?? '' }}
                            </td>
                            <td>
                                {{ $post->update_at ?? '' }}
                            </td>
                            <td >
                                {{ $post->status ?? '' }}
                            </td>
                            <td>
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.products.show', $post->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.products.edit', $post->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                    <form action="{{ route('admin.products.destroy', $post->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
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
