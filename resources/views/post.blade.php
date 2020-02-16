@extends('layouts.app')
@section('content')
    <div class="newspage-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-9 col-sm-8 col-12">
                    <div class="list-news">
                        @foreach( $posts as $item )
                        <div class="list-item">
                            <a href="{{ route('news.detail',$item->seo_url ) }}" class="item-link">
                                <div class="col-md-6">
                                    <img src="{{url('/upload/post/'.$item->image)}}" width="300px" height="200px">
                                    <div class="item-calendar">
                                        <span class="calendar-day">
                                            {{date("d",strtotime($item->created_at))}}
                                        </span>
                                        <br>
                                        <span class="calendar-month">
                                            Th {{date("m",strtotime($item->created_at))}}
                                        </span>
                                    </div>
                                </div>
                                <div class="item-info col-md-6">
                                    <strong>{{ $item->title }}</strong>
                                    <div class="is-divider small"></div>
                                    <p class="news-description">
                                        {!! $item->description !!}
                                    </p>
                                </div>
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
                @include('partials.contact')

            </div>
        </div>
    </div>

@endsection
@section('scripts')
@parent

@endsection
