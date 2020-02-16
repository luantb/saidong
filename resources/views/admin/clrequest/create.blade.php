@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Thêm Banner
    </div>

    <div class="card-body">
        <form action="{{ route("admin.banner.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                <label for="name">Tên banner</label>
                <input type="text" id="name" name="title" class="form-control" value="{{ old('title', isset($post) ? $post->title : '') }}">
                @if($errors->has('title'))
                    <em class="invalid-feedback">
                        {{ $errors->first('title') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.product.fields.name_helper') }}
                </p>
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
                <label for="status">Hiển thị </label>
                <input type="checkbox" id="status" name="status"  value="1" }>

            </div>


            <div>
                <input class="btn btn-danger" type="submit" value="Thêm">
            </div>
        </form>
    </div>
</div>

@endsection
@section('scripts')


@endsection
