@extends('layouts.app')
@section('content')
    <div class="newspage-content">
        <div class="container">
            {!! $setting->contact_info !!}
        </div>
    </div>

@endsection
@section('scripts')
@parent

@endsection
