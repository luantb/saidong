<html>
<head>
    <title>{{ $setting->project_name }}</title>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/homepage.css">
    <link rel="stylesheet" href="../css/newspage.css">
    <link rel="stylesheet" href="../css/newsdetail.css">
    <link rel="stylesheet" href="../css/common.css">
    <link rel="stylesheet" href="../css/footer.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="../js/app.js"></script>
    <script src="../js/script.js"></script>
</head>
<body>
<div class="header">
    <div class="container">
        <div class="navbar-custom">
            <div class="menu-button">
                <svg width="15" height="15" viewBox="0 0 21 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect width="21" height="3" rx="1.5" fill="#D3D7E0"/>
                    <rect y="7" width="21" height="3" rx="1.5" fill="#D3D7E0"/>
                    <rect y="14" width="21" height="3" rx="1.5" fill="#D3D7E0"/>
                </svg>
            </div>
            <div class="nav-logo">
                <img src="https://tsglotuslongbien.net/wp-content/uploads/t%E1%BA%A3i-xu%E1%BB%91ng.png" alt="">
            </div>
            <div class="background-nav">
                <div class="nav-menu">
                    <ul class="list-unstyled">
                        <li class="menu-item">
                            <a href="/">TRANG CHỦ</a>
                        </li>
                        @foreach($listmenu as $menu)

                            <li class="menu-item">
                                <a href="{{ ($menu->page_type == 1?'#':'/').$menu->slug_title }}">{{ $menu->menu_name }}</a>
                            </li>
                        @endforeach


                    </ul>
                </div>
                <button title="Close (Esc)" type="button" class="mfp-close">×</button>
            </div>
        </div>
    </div>

</div>

@yield('content')

<div class="footer">
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4 footer-top-item">
                    <div class="footer-top-title">
                        PHÒNG KINH DOANH DỰ ÁN
                    </div>
                    <div class="is-divider small"></div>
                    <div class="footer-top-content first-col">
                        <p>
                            <strong>Địa Chỉ:&nbsp;{{  $setting->address }}</strong><br>
                            <strong>Hotline:&nbsp; {{  $setting->hotline }}</strong><br>
                            <strong>Email:&nbsp;{{  $setting->email }}</strong><br>
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 footer-top-item">
                    <div class="footer-top-title">
                        NHẬN BÁO GIÁ DỰ ÁN
                    </div>
                    <div class="is-divider small"></div>
                    <form action="{{ route('home.sendRequest') }}" method="POST" >
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="footer-top-content">
                        <div class="form-input">
                            <input type="text" name="name" required placeholder="Tên khách hàng">
                        </div>
                        <div class="form-input">
                            <input type="text" name="email" placeholder="Địa chỉ email">
                        </div>
                        <div class="form-input">
                            <input type="text" name="phone"  required placeholder="Điện thoại liên hệ">
                        </div>
                        <div class="form-button">
                            <button type="submit" class="btn-sign">ĐĂNG KÝ NGAY</button>
                        </div>
                    </div>
                    </form>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 footer-top-item">
                    <div class="footer-top-title">
                        TIN TỨC MỚI NHẤT
                    </div>
                    <div class="is-divider small"></div>
                    <div class="footer-top-content">
                        @foreach($newsHome as $news)
                            <div class="news-item">
                                <img src="{{url('/upload/post/'.$news->image)}}" alt="{{$news->title}}">
                                <a class="news-title" href="">
                                    {{$news->title}}
                                </a>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="footer-bottom-content">
                <div class="footer-botom-left">
                    © Copyright 2020 | <a href="/">{{ $setting->project_name }}</a>
                </div>
                <div class="footer-botom-right">
                    <strong>Web Design By <a href="/">T-Studio</a></strong>
                </div>
            </div>
        </div>
    </div>
</div>

<a id="button"></a>
<div class="fix_tel">
    <div class="ring-alo-phone">
        <div class="ring-alo-ph-img-circle">
            <a href="tel:{{ str_replace(' ','',$setting->hotline) }}">
                <img class="lazy"
                     src="https://tsglotuslongbien.net/wp-content/plugins/easy-call-now/public/images/phone-ring.png"
                     alt="">
            </a>
        </div>
    </div>
    <div class="tel">
        <p class="fone">{{  $setting->hotline }}</p>
    </div>
</div>

@if(Session::has('mgs'))
<script id="alert">
    alert('{!! Session::get('mgs') !!}  ' );
</script>
@php(Session::forget('mgs'))

<script >
    location.reload();
</script>
@endif


</body>
</html>
