@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Thêm panel
    </div>

    <div class="card-body">
        <form action="{{ route("admin.test.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                <label for="name">Tiêu đề *</label>
                <input type="text" id="name" name="title" class="form-control" value="{{ old('title', isset($panel) ? $panel->title : '') }}">
                @if($errors->has('title'))
                    <em class="invalid-feedback">
                        {{ $errors->first('title') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.product.fields.name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('menu_name') ? 'has-error' : '' }}">
                <label for="name">Tên menu</label>
                <input type="text" id="menu_name" name="menu_name" class="form-control" value="{{ old('menu_name', isset($panel) ? $panel->title : '') }}">
                @if($errors->has('menu_name'))
                    <em class="invalid-feedback">
                        {{ $errors->first('menu_name') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.product.fields.name_helper') }}
                </p>
            </div>

            <div class="form-group {{ $errors->has('order_number') ? 'has-error' : '' }}">
                <label for="name">Thứ tự hiển thị</label>
                <input type="text" id="name" name="order_number" class="form-control" value="{{ old('order_number', isset($panel) ? $panel->order_number : '') }}">
                @if($errors->has('order_number'))
                    <em class="invalid-feedback">
                        {{ $errors->first('order_number') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.product.fields.name_helper') }}
                </p>
            </div>






            <div class="form-group ">
                <label for="type">Vi trí hiển thị</label>
            </div>
            <div class="form-group {{ $errors->has('position') ? 'has-error' : '' }}">
                <div class="form-control">
                    <input type="radio" id="imgtext" name="position"  checked value="1" >
                    <label for="imgtext">ảnh ( trái ) - chữ ( phải )</label>
                </div>
                <div class="form-control">
                    <input type="radio" id="textImg" name="position"  value="2" >
                    <label for="textImg">Chữ( trái ) - ảnh ( phải )</label>
                </div>
                <div class="form-control">
                    <input type="radio" id="onlyText" name="position"  value="3" >
                    <label for="onlyText">Chỉ chữ</label>
                </div>
                <div class="form-control">
                    <input type="radio" id="textForm" name="position"  value="4" >
                    <label for="textForm">Chữ ( trái ) - form ( phải )</label>
                </div>
                <div class="form-control">
                    <input type="radio" id="panelOther" name="position"  value="0" >
                    <label for="panelOther">Chính giữa</label>
                </div>

            </div>
            <div class="form-group ">
                <label for="type">Loại trang</label>
            </div>
            <div class="form-group {{ $errors->has('page_type') ? 'has-error' : '' }}">
                <div class="form-control">
                    <input type="radio" id="onPage" name="page_type"  checked value="1"  >
                    <label for="onPage">Chỉ hiển thị ở trang chủ</label>
                </div>
                <div class="form-control">
                    <input type="radio" id="redirectPage" name="page_type"  value="2" >
                    <label for="redirectPage">Chuyển hướng tới trang con</label>
                </div>
            </div>
            <div class="form-group ">
                <label for="type">Loại Panel</label>
            </div>
            <div class="form-group {{ $errors->has('type') ? 'has-error' : '' }}">
                <div class="form-control">
                    <input type="radio" id="typeText" name="type"  checked value="1"  >
                    <label for="typeText">Nội dung bằng chữ hoặc hình ảnh</label>
                </div>
                <div class="form-control">
                    <input type="radio" id="typeNews" name="type"  value="2" >
                    <label for="typeNews">Danh sách 4 tin tức</label>
                </div>
                <div class="form-control">
                    <input type="radio" id="typeProd" name="type"   value="3"  >
                    <label for="typeProd">Danh sách 3 sản phẩm</label>
                </div>
                <div class="form-control">
                    <input type="radio" id="typeForm" name="type"  value="4" >
                    <label for="typeForm">Form nhận yêu cầu của khách hàng</label>
                </div>
            </div>

            <div class="form-group {{ $errors->has('image') ? 'has-error' : '' }}">
                <label for="name">Ảnh  </label>
                <em class="text-success">Nếu Loại Panel là ds sản phẩm ,ds tin tức , form thông tin thì không cần chọn ảnh  </em>
                <input type="file" id="name"  name="image[]" class="form-control" value="{{ old('image', isset($panel) ? $panel->image : '')  }} " multiple >
                @if($errors->has('image'))
                    <em class="invalid-feedback">
                        {{ $errors->first('image') }}
                    </em>
                @endif
            </div>

            <div class="form-group {{ $errors->has('content') ? 'has-error' : '' }}">
                <label for="content1">Nội dung</label>
                <em class="text-success">Nếu Loại Panel là ds sản phẩm ,ds tin tức , form thông tin thì không cần nhập nội dung  </em>
                <textarea id="content1" name="content" class="form-control ">{{ old('content', isset($panel) ? $panel->content : '') }}</textarea>
                @if($errors->has('content'))
                    <em class="invalid-feedback">
                        {{ $errors->first('content') }}
                    </em>
                @endif
            </div>

            <div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
                <label for="status">Hiển thị </label>
                <input type="checkbox" id="status" name="status"  value="1" }>
            </div>

            <div class="form-group {{ $errors->has('in_menu') ? 'has-error' : '' }}">
                <label for="in_menu">Menu chính </label>
                <input type="checkbox" id="in_menu" name="status"  value="1" }>
            </div>



            <div>
                <input class="btn btn-danger" type="submit" value="Lưu">
            </div>
        </form>
    </div>
</div>

<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script>
    CKEDITOR.replace( 'content1', {
        filebrowserBrowseUrl: '{{ asset('ckfinder/ckfinder.html') }}',
        filebrowserImageBrowseUrl: '{{ asset('ckfinder/ckfinder.html?type=Images') }}',
        filebrowserFlashBrowseUrl: '{{ asset('ckfinder/ckfinder.html?type=Flash') }}',
        filebrowserUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') }}',
        filebrowserImageUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}',
        filebrowserFlashUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash') }}'
    } );
</script>
<script type="text/javascript">

    $(document).ready(function() {

        $(".btn-success").click(function(){
            var html = $(".clone").html();
            $(".increment").after(html);
        });

        $("body").on("click",".btn-danger",function(){
            $(this).parents(".control-group").remove();
        });

    });

</script>
@endsection
@section('scripts')


@endsection
