@extends('layouts.app')
@section('content')
    <div class="newspage-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-9 col-sm-8 col-12">
                    <div class="news-detail">
                        <div class="news-title">
                            <div class="categories">{{ $post->type ==1 ?"TIN TỨC":"SẢN PHẨM" }}</div>
                            <strong class="title">{{ $post->title }}</strong>
                        </div>
                        <div class="entry-divider is-divider small"></div>
                        <div class="news-content">
                            <div class="news-body">
                                {!! $post->content !!}
                            </div>
                        </div>
                        <div class="news-bottom" style="display: none">
                            <div class="pre-news">
                                <i class="icon-angle-left"></i>
                                <span> Chủ đầu tư dự án TSG LOTUS SÀI ĐỒNG là ai?</span>
                            </div>
                            <div class="question-news">
                                <div class="question-news-title">
                                    Trả lời
                                </div>
                                <div class="question-news-note">Email của bạn sẽ không được hiển thị công khai. Các trường bắt buộc được đánh dấu *</div>
                            </div>
                            <div class="question-news-form">
                                <div class="comment news-form-item">
                                    <label>Bình luận</label><br>
                                    <textarea class="comment-text"></textarea>
                                </div>
                                <div class="info">
                                    <div class="info-name news-form-item">
                                        <label>Tên *</label><br>
                                        <input type="text" class="name">
                                    </div>
                                    <div class="info-email news-form-item">
                                        <label>Email *</label><br>
                                        <input type="text" class="name">
                                    </div>
                                    <div class="info-web news-form-item">
                                        <label>Trang web</label><br>
                                        <input type="text" class="name">
                                    </div>
                                </div>
                                <div class="send-button">
                                    <button>Phản hồi</button>
                                </div>
                            </div>
                        </div>
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
