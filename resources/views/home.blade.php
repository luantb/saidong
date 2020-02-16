@extends('layouts.app')
@section('content')
    <div class="slider-section">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                @foreach($banners as $key => $banner)
                    <li data-target="#myCarousel" data-slide-to="{{ $key }}" class="{{ $key == 0 ?? 'active' }}"></li>

                @endforeach
            </ol>
            <div class="carousel-inner">


                @foreach($banners as $key => $banner)
                    <div class="item {{ $key==0? 'active':'' }}">
                        <img src="{{url('/upload/banner/'.$banner->image)}}" alt="{{ $banner->description }}" style="width:100%;">
                    </div>
                @endforeach
            </div>
            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    @foreach($listPanel as $panel)

    @if($panel->type == 1 && $panel->position == 1)
    <div class="overview-section" id="{{ $panel->slug_title }}">
        <div class="section-title">
            {{$panel->title}}
        </div>
        <div class="section-content container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 content-left">
                    <ul class="content-left-list">
                        {!! $panel->content !!}
                    </ul>

                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 content-right">
                    @if(!empty($panel->gallerys))
                        @if(count($panel->gallerys) > 1)
                            <ol class="carousel-indicators">
                                @foreach( $panel->gallerys as $key=>$value )
                                    <li data-target="#systemCarousel" data-slide-to="{{ $key }}" class=" {{ $key == 0 ?'active' :'' }}"></li>
                                @endforeach


                            </ol>

                                <div id="systemCarousel" class="carousel slide" data-ride="carousel">

                                    <div class="carousel-inner">
                                        @foreach( $panel->gallerys as $key => $gallery)
                                        <div class="item {{ $key == 0 ?'active' :'' }}">
                                            <img src="{{url('/upload/gallery/'.$gallery->name )}} " alt="" style="width:100%;">
                                        </div>

                                        @endforeach

                                    </div>
                                    <a class="left carousel-control" href="#systemCarousel" data-slide="prev">
                                        <span class="glyphicon glyphicon-chevron-left"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="right carousel-control" href="#systemCarousel" data-slide="next">
                                        <span class="glyphicon glyphicon-chevron-right"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>

                        @else
                            <img src="{{url('/upload/gallery/'.$panel->gallerys[0]->name )}}" alt="" />
                        @endif
                    @endif

                </div>
            </div>
        </div>
    </div>
    @elseif($panel->type == 1 && $panel->position == 2)
        <div class="overview-section" id="{{ $panel->slug_title }}">
            <div class="section-title">
                {{$panel->title}}
            </div>
            <div class="section-content container">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 content-right">

                        @if(!empty($panel->gallerys))
                            @if(count($panel->gallerys) > 1)
                                <ol class="carousel-indicators">
                                    @foreach( $panel->gallerys as $key=>$value )
                                        <li data-target="#systemCarousel" data-slide-to="{{ $key }}" class=" {{ $key == 0 ?'active' :'' }}"></li>
                                    @endforeach


                                </ol>

                                <div id="systemCarousel" class="carousel slide" data-ride="carousel">

                                    <div class="carousel-inner">
                                        @foreach( $panel->gallerys as $key => $gallery)
                                            <div class="item {{ $key == 0 ?'active' :'' }}">
                                                <img src="{{url('/upload/gallery/'.$gallery->name )}} " alt="" style="width:100%;">
                                            </div>

                                        @endforeach

                                    </div>
                                    <a class="left carousel-control" href="#systemCarousel" data-slide="prev">
                                        <span class="glyphicon glyphicon-chevron-left"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="right carousel-control" href="#systemCarousel" data-slide="next">
                                        <span class="glyphicon glyphicon-chevron-right"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>

                            @else
                                <img src="{{url('/upload/gallery/'.$panel->gallerys[0]->name )}} " alt="" />
                            @endif
                        @endif


                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 content-left">
                        <ul class="content-left-list">
                            {!! $panel->content !!}
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    @elseif($panel->type == 3 )
    <div class="product-section">
        <div class="section-title">
            {{$panel->title}}
        </div>
        <div class="section-content container">
            <div class="row">
                @foreach($listProduct as $product )
                <div class="col-lg-4 col-md-4 col-sm-4">
                    <a href="{{ route('news.detail',$product->seo_url ) }}" style="color: #333; text-decoration: none">
                        <div class="product-item">
                            <div class="product-item-image">
                                <img src="{{url('/upload/post/'.$product->image)}}" alt="{{$product->image}}" alt="" />
                            </div>
                            <div class="product-item-content">
                                <div class="product-title">
                                    {{$product->title}}
                                </div>
                                <div class="product-description">
                                    {!!$product->description !!}
                                    {{--<ul>
                                        <li class="description-item">Tổng 328 căn hộ cao cấp và Penhouse</li>
                                        <li class="description-item">Diện tích đất 71.5 m2 đến 386 m2</li>
                                        <li class="description-item">Số phòng ngủ: từ 2 PN đến 5 PN</li>
                                        <li class="description-item">Giá bán từ 24 triệu/m2 đến 26 triệu/m2</li>
                                    </ul>--}}
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach


            </div>
        </div>
    </div>
    @elseif($panel->type == 4 )
    <div class="contact-section">
        <div class="container">
            <div class="contact-content">
                <div class="contact-title">
                    <strong>LIÊN HỆ TƯ VẤN, NHẬN BẢNG GIÁ VÀ ĐẶT LỊCH XEM DỰ ÁN</strong>
                </div>
                <div class="contact-hotline">
                    <strong>HOTLINE:  0902 232 293</strong>
                </div>
                <form action="{{ route('home.sendRequest') }}" method="POST" >
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="contact-form">
                        <div class="form-item">
                            <input type="text" name="name" required placeholder="Tên khách hàng*">
                        </div>
                        <div class="form-item">
                            <input type="text" name="email" placeholder="Địa chỉ Email">
                        </div>
                        <div class="form-item">
                            <input type="text" name="phone" required placeholder="Điện thoại liên hệ*">
                        </div>
                        <div class="form-item">
                            <button type="submit" class="btn-res">ĐĂNG KÝ TƯ VẤN</button>
                        </div>

                </div>
                </form>

            </div>
        </div>
    </div>
    @elseif($panel->type == 2 )
    <div class="news-section container" id="{{ $panel->slug_title }}">
        <div class="section-title">
            <b></b>
            <span class="section-title-main" style="color:rgb(3, 54, 58);">{{ $panel->title }}</span>
            <b></b>
        </div>
        <div class="section-content ">
            <div class="row">
                @foreach( $listNews as $newItems)
                <div class="col-lg-3 col-md-3 col-sm-3">
                    <a href="{{ route('news.detail',$newItems->seo_url ) }}" style="color: #000000 ; text-decoration:none">
                        <div class="news-item">
                            <div class="news-item-image">
                                <img src="{{url('/upload/post/'.$newItems->image)}}" alt="{{$newItems->title}}">
                                <div class="item-calendar">
                                    <span class="calendar-day">
                                        {{date("d",strtotime($newItems->created_at))}}
                                    </span>
                                    <br>
                                    <span class="calendar-month">
                                        Th {{date("m",strtotime($newItems->created_at))}}
                                    </span>
                                </div>
                            </div>
                            <div class="news-bottom">
                                <div class="news-item-title">
                                    {{ $newItems->title }}
                                </div>
                                <div class="is-divider"></div>
                                <div class="news-item-description">
                                    {{ $newItems->description }}
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    @elseif(strlen($panel->title) > 0 && strlen($panel->content) > 0)
    <div class="progress-section container" id="{{$panel->slug_title}}">
        <div class="section-title">
            {{$panel->title}}
        </div>
        <div class="section-content">
            {!! $panel->content !!}

        </div>
    </div>
    @endif

    @endforeach
    <div class="scroll-to-bullets hide-for-medium">
    @foreach($listPanel as $itemPanel)
        @if($itemPanel->page_type == 1 && $itemPanel->type == 1)
            <a href="{{ ($itemPanel->page_type == 1?'#':'/').$itemPanel->slug_title }} " data-title="{{$itemPanel->menu_name}}" title="{{$itemPanel->menu_name}}" class="tooltipstered">
                <strong></strong>
            </a>
        @endif
    @endforeach
    </div>

@endsection
@section('scripts')
@parent

@endsection
