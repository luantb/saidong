@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
       Cài đặt dự án
    </div>
    @if(\Illuminate\Support\Facades\Session::has('success'))
        <p class="alert alert-success">{{ \Illuminate\Support\Facades\Session::get('success') }}</p>
    @endif
    @if(\Illuminate\Support\Facades\Session::has('error'))
        <p class="alert alert-danger">{{ \Illuminate\Support\Facades\Session::get('error') }}</p>
    @endif
    <div class="card-body">
        <form action="{{ route("admin.home.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('hotline') ? 'has-error' : '' }}">
                <label for="hotline">HotLine</label>
                <input type="hidden" id="id" name="id"  value="{{ old('hotline', isset($setting) ? $setting->id : '') }}">
                <input type="text" id="hotline" name="hotline" class="form-control" value="{{ old('hotline', isset($setting) ? $setting->hotline : '') }}">
                @if($errors->has('title'))
                    <em class="invalid-feedback">
                        {{ $errors->first('hotline') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.product.fields.name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('project_name') ? 'has-error' : '' }}">
                <label for="project_name">Tên dự án </label>
                <input id="project_name" name="project_name" class="form-control " value=" {{ old('project_name', isset($setting) ? $setting->project_name : '') }} ">
                @if($errors->has('project_name'))
                    <em class="invalid-feedback">
                        {{ $errors->first('project_name') }}
                    </em>
                @endif
            <div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
                <label for="address">Địa chỉ </label>
                <input id="address" name="address" class="form-control " value=" {{ old('address', isset($setting) ? $setting->address : '') }} ">
                @if($errors->has('address'))
                    <em class="invalid-feedback">
                        {{ $errors->first('address') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
                <label for="email">Email </label>
                <input id="email" name="email" class="form-control " value=" {{ old('email', isset($setting) ? $setting->email : '') }} ">
                @if($errors->has('email'))
                    <em class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('facebook') ? 'has-error' : '' }}">
                <label for="facebook">Facebook </label>
                <input id="facebook" name="facebook" class="form-control " value=" {{ old('facebook', isset($setting) ? $setting->facebook : '') }} ">
                @if($errors->has('facebook'))
                    <em class="invalid-feedback">
                        {{ $errors->first('facebook') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('zalo') ? 'has-error' : '' }}">
                <label for="zalo">Zalo </label>
                <input id="zalo" name="zalo" class="form-control " value=" {{ old('zalo', isset($setting) ? $setting->zalo : '') }} ">
                @if($errors->has('zalo'))
                    <em class="invalid-feedback">
                        {{ $errors->first('zalo') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('contact_info') ? 'has-error' : '' }}">
                <label for="contact_info">Thông tin trang liên hệ </label>
                <textarea id="contact_info" name="contact_info" class="form-control " >{{ old('contact_info', isset($setting) ? $setting->contact_info : '') }} </textarea>
                @if($errors->has('contact_info'))
                    <em class="invalid-feedback">
                        {{ $errors->first('contact_info') }}
                    </em>
                @endif
            </div>
                <div class="form-group {{ $errors->has('baner_contact') ? 'has-error' : '' }}">
                    <label for="baner_contact">Ảnh 300px * 130px  </label>
                    <input type="file" id="baner_contact" name="baner_contact" class="form-control" value="{{ old('baner_contact', isset($setting) ? $setting->baner_contact : '') }}">
                    @if($errors->has('baner_contact'))
                        <em class="invalid-feedback">
                            {{ $errors->first('baner_contact') }}
                        </em>
                    @endif
                    <img src="{{url('/upload/setting/'.$setting->baner_contact)}}" alt="">
                </div>




            <div>
                <input class="btn btn-danger" type="submit" value="Lưu">
            </div>
        </form>
    </div>
</div>
<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script>
    CKEDITOR.replace( 'contact_info', {
        filebrowserBrowseUrl: '{{ asset('ckfinder/ckfinder.html') }}',
        filebrowserImageBrowseUrl: '{{ asset('ckfinder/ckfinder.html?type=Images') }}',
        filebrowserFlashBrowseUrl: '{{ asset('ckfinder/ckfinder.html?type=Flash') }}',
        filebrowserUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') }}',
        filebrowserImageUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}',
        filebrowserFlashUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash') }}'
    } );
</script>


@endsection
@section('scripts')


@endsection
