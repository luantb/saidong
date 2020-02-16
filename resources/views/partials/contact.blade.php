<div class="col-lg-3 col-md-3 col-sm-4 col-12" style="border-left: 1px solid #ececec;">
    <div class="list-info">
        <div class="list-info-item">
            <div class="info-item-title">
                PHÒNG KINH DOANH
            </div>
            <div class="is-divider big"></div>
            <div class="info-item-content">
                <img src="{{url('/upload/setting/'.$setting->baner_contact)}} " width="300px" height="130px">
            </div>
        </div>
        <div class="list-info-item">
            <div class="info-item-title">
                TIN TỨC DỰ ÁN
            </div>
            <div class="is-divider big"></div>
            <div class="info-item-content">
                <div class="list-project-news">
                    @foreach( $projects as $item)
                    <div class="project-news-item">
                        <div class="project-news-image">
                            <img src="{{url('/upload/post/'.$item->image)}}" alt="">
                        </div>
                        <div class="project-news-title">
                            <a href="{{ route('news.detail',$item->seo_url ) }}">
                                {{ $item->title }}
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="list-info-item">
            <div class="info-item-title">
                NHẬN BÁO GIÁ DỰ ÁN
            </div>
            <div class="is-divider big"></div>
            <form action="{{ route('home.sendRequest') }}" method="POST" >
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="info-item-content">
                <div class="form-input">
                    <input type="text" name="name" required placeholder="Tên khách hàng">
                </div>
                <div class="form-input">
                    <input type="text" name="email" placeholder="Địa chỉ email">
                </div>
                <div class="form-input">
                    <input type="text" required name="phone" placeholder="Điện thoại liên hệ">
                </div>
                <div class="form-button">
                    <button class="btn-sign">ĐĂNG KÝ NGAY</button>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
