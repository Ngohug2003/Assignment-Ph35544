@extends('layouts.master')
@section('title', 'Danh sách tin tức')
@section('content')
<h6>Kết quả tìm kiếm cho: "{{ $keyword }}"</h6>
 {{-- @if($posts->isEmpty())
                <p>Không tìm thấy bài viết nào.</p>
            @else --}}
<div class="top-news-area section-padding-100">
   
    <div class="container">
        <div class="row">
           
            <!-- Single News Area -->
            @foreach ($posts as $item)
            <div class="col-12 col-sm-6 col-lg-4">
                <div class="single-blog-post style-2 mb-5">
                    <!-- Blog Thumbnail -->
                    <div class="blog-thumbnail">
                        <a  href="{{url('/title',$item->id)}}"><img  src="{{$item->img_url}}" alt=""></a>
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
                    <a href="#" class="btn newsbox-btn">Xem thêm</a>
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