@extends('layouts.admin')
@section('content')


<div class="card">
    <div class="card-header">
        Danh sách yêu cầu
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable">
                <thead>
                    <tr>

                        <th>
                            Tên khách
                        </th>
                        <th>
                            Số điện thoại
                        </th>


                        <th>
                            email
                        </th>
                        <th>
                            Trạng thái
                        </th>
                        <th>
                            Ngày tạo
                        </th>
                        <th>
                            Thao tác
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($clients as $key => $client)
                        <tr data-entry-id="{{ $client->id }}">
                            <td>
                                {{ $client->name ?? '' }}
                            </td>
                            <td>
                                {{ $client->phone ?? '' }}
                            </td>
                            <td>
                                {{ $client->email ?? '' }}
                            </td>

                            <td >
                                @if($client->status ==1 )
                                    <span class="btn btn-xs btn-success">Đã phản hồi</span>
                                @else
                                    <span class="btn btn-xs btn-danger">Chưa phản hồi</span>
                                 @endif
                            </td>
                            <td>
                                {{ $client->created_at }}
                            </td>
                            <td>
                                @if($client->status ==0 )
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.clientRequest.edit', $client->id) }}">
                                        Đã phản hổi
                                    </a>
                                @endif

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


@endsection
