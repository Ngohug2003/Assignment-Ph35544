@extends('layouts.client.master')
@section('title', 'Trang chủ')
@section('content')
<section class="video-area bg-img bg-overlay bg-fixed" style="background-image: url({{asset('asset/img/bg-img/10.jpg')}});">
    <div class="container">
        <div class="row">
            <!-- Featured Video Area -->
            <div class="col-12">
                <div class="featured-video-area d-flex align-items-center justify-content-center">
                    <div class="video-content text-center">
                        <a href="#" class="video-btn"><i class="fa fa-play" aria-hidden="true"></i></a>
                        <span class="published-date"></span>
                        <h3 class="video-title">Tin tức mới nhất</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Video Slideshow -->
    <div class="video-slideshow py-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Video Slides -->
                    <div class="video-slides owl-carousel">

                        <!-- Single News Area -->
                        @foreach ($posts as $item)
                        <div class="single-blog-post style-3">
                            <!-- Blog Thumbnail -->
                            <div class="blog-thumbnail">
                                <a href="{{url('/title',$item->id)}}"><img style="width: 500px; height: 250px;" src="{{asset('storage/'.$item->img_url)}}" alt=""></a>
                                <a href="{{url('/title',$item->id)}}" class="video-btn"><i class="fa fa-play" aria-hidden="true"></i></a>
                            </div>

                            <!-- Blog Content -->
                            <div class="blog-content">
                                <span class="post-date">{{$item->created_at}}</span>
                                <p class="post-title">{{$item->title}}</p>
                                <a href="{{url('/title',$item->id)}}" class="post-author">By Michael Smith</a>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="top-news-area section-padding-100">
    <div class="container">
        <div class="row">
            <!-- Single News Area -->
            @foreach ($posts as $item)
            <div class="col-12 col-sm-6 col-lg-4">
                <div class="single-blog-post style-2 mb-5">
                    <!-- Blog Thumbnail -->
                    <div class="blog-thumbnail">
                        <a  href="{{url('/title',$item->id)}}"><img  src="{{asset('storage/'.$item->img_url)}}" alt=""></a>
                    </div>

                    <!-- Blog Content -->
                    <div class="blog-content">
                        <span class="post-date">{{$item->created_at}}</span>
                        <a href="{{url('/title',$item->id)}}" class="post-title">{{$item->title}}</a>
                        <a href="{{url('/title',$item->id)}}" class="post-author">By Michael Smith</a>
                    </div>
                </div>
            </div>
            @endforeach
            <div class="col-12">
                <div class="load-more-button text-center">
                    <a href="{{route('category.showAll')}}" class="btn newsbox-btn">Xem thêm</a>
                </div>
            </div>

        </div>
    </div>
</div>
<div class="big-add-area mb-100">
    <div class="container-fluid">
        <a href="#"><img src="{{asset('asset/img/bg-img/add2.png')}}" alt=""></a>
    </div>
</div> 
@endsection