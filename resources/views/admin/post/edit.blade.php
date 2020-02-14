@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Sửa bài viết
    </div>

    <div class="card-body">
        <form action="{{ route("admin.post.update", [$post->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                <label for="name">Tiêu đề *</label>
                <input type="text" id="name" name="title" class="form-control" value="{{ old('title', isset($post) ? $post->title : '') }}">
                <input type="hidden" id="id" name="id"  value="{{  $post->id }}">
                @if($errors->has('title'))
                    <em class="invalid-feedback">
                        {{ $errors->first('title') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.product.fields.name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('keywords') ? 'has-error' : '' }}">
                <label for="name">Từ khóa ( <small>vd: nha dat,bds,chung cu,...</small>)</label>
                <input type="text" id="name" name="keywords" class="form-control" value="{{ old('keywords', isset($post) ? $post->keywords : '') }}">
                @if($errors->has('keywords'))
                    <em class="invalid-feedback">
                        {{ $errors->first('keywords') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('image') ? 'has-error' : '' }}">
                <label for="name">Ảnh  </label>
                <input type="file" id="name" name="image" class="form-control" value="{{ old('image', isset($post) ? $post->image : '') }}">
                @if($errors->has('image'))
                    <em class="invalid-feedback">
                        {{ $errors->first('image') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                <label for="description">Mô tả </label>
                <textarea id="description" name="description" class="form-control ">{{ old('description', isset($post) ? $post->description : '') }}</textarea>
                @if($errors->has('description'))
                    <em class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('content') ? 'has-error' : '' }}">
                <label for="content1">Nội dung</label>
                <textarea id="content1" name="content" class="form-control ">{{ old('content', isset($post) ? $post->content : '') }}</textarea>
                @if($errors->has('content'))
                    <em class="invalid-feedback">
                        {{ $errors->first('content') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('type') ? 'has-error' : '' }}">
                <label for="type">Loại tin</label>
                <select name="type" id="type">
                    <option value="1" {{ old('type',$post->type =1 ? 'checked'  : '') }}>Tin tức</option>
                    <option value="2" {{ old('type',$post->type =2 ? 'checked'  : '') }} >Sản phẩm</option>
                </select>
            </div>
            <div class="form-group {{ $errors->has('content') ? 'has-error' : '' }}">
                <label for="status">Hiển thị </label>
                <input type="checkbox" id="status" name="status"  value="1" {{ old('status',$post->status =1 ? 'checked'  : '') }} }>

                <label for="is_top">Ghim top </label>
                <input type="checkbox" id="is_top" name="is_top"  value="1" {{ old('is_top',$post->is_top =1 ? 'checked'  : '') }} >
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="Lưu">
            </div>
        </form>
    </div>
</div>

@endsection
