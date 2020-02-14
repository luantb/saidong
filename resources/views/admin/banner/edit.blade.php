@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Sửa banner
    </div>

    <div class="card-body">
        <form action="{{ route("admin.banner.update", [$banner->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @csrf
            <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                <label for="name">Tên banner</label>
                <input type="hidden"  name="id" class="form-control" value="{{ $banner->id  }}">
                <input type="text" id="name" name="title" class="form-control" value="{{ old('title', isset($banner) ? $banner->title : '') }}">
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
                <input type="file" id="name" name="image" class="form-control" value="{{ old('image', isset($banner) ? $banner->image : '') }}">
                @if($errors->has('image'))
                    <em class="invalid-feedback">
                        {{ $errors->first('image') }}
                    </em>
                @endif
                <img style="height: 200px;width: auto" src="{{url('/upload/banner/'.$banner->image)}}" alt="{{$banner->image}}">
            </div>
            <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                <label for="description">Mô tả </label>
                <textarea id="description" name="description" class="form-control ">{{ old('description', isset($banner) ? $banner->description : '') }}</textarea>
                @if($errors->has('description'))
                    <em class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </em>
                @endif
            </div>

            <div class="form-group {{ $errors->has('content') ? 'has-error' : '' }}">
                <label for="status">Hiển thị </label>
                <input type="checkbox" id="status" name="status"  value="1" {{ $banner->status ==1 ?'checked':'' }} }>

            </div>


            <div>
                <input class="btn btn-danger" type="submit" value="Thêm">
            </div>
        </form>
    </div>
</div>

@endsection
