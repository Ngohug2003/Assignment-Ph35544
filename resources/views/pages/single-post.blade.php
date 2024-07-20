@extends('layouts.master')
@section('title', 'Tin tức')
@section('content')

<div class="post-details-title-area bg-overlay clearfix" style="background-image: url('{{$posttitle->img_url}}')">
    <div class="container-fluid h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12 col-lg-8">
                <!-- Post Content -->
                <div class="post-content">
                    <p class="tag"><span>{{$category->name}}</span></p>
                    <p class="post-title">{{$posttitle->title}}</p>
                    <div class="d-flex align-items-center">
                        <span class="post-date mr-30">{{$posttitle->created_at}}</span>
                        <span class="post-date">By VietHung</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="post-news-area section-padding-100-0 mb-70">
    <div class="container">
        <div class="row justify-content-center">
            <!-- Post Details Content Area -->
            <div class="col-12 col-lg-8">
                <div class="post-details-content mb-100">
                    <p>{{$posttitle->content}}</p>
                </div>

                <!-- Comment Area Start -->
                <div class="comment_area clearfix mb-100">
                    <h4 class="mb-50">Comments</h4>

                    <ol>
                        <!-- Single Comment Area -->
                        <li class="single_comment_area">
                            <!-- Comment Content -->
                            <div class="comment-content d-flex">
                                <!-- Comment Author -->
                                <div class="comment-author">
                                    <img src="img/bg-img/32.jpg" alt="author">
                                </div>
                                <!-- Comment Meta -->
                                <div class="comment-meta">
                                    <div class="d-flex">
                                        <a href="#" class="post-author">Maria Williams</a>
                                        <a href="#" class="post-date">June 23, 2018 </a>
                                        <a href="#" class="reply">Reply</a>
                                    </div>
                                    <p>Consectetur adipiscing elit. Praesent vel tortor facilisis, volutpat nulla placerat, tinci dunt mi. Nullam vel orci dui. Su spendisse sit amet laoreet neque. Fusce sagittis sus cipit sem a consequat.</p>
                                </div>
                            </div>
                            <ol class="children">
                                <li class="single_comment_area">
                                    <!-- Comment Content -->
                                    <div class="comment-content d-flex">
                                        <!-- Comment Author -->
                                        <div class="comment-author">
                                            <img src="img/bg-img/33.jpg" alt="author">
                                        </div>
                                        <!-- Comment Meta -->
                                        <div class="comment-meta">
                                            <div class="d-flex">
                                                <a href="#" class="post-author">Christian Williams</a>
                                                <a href="#" class="post-date">April 15, 2018</a>
                                                <a href="#" class="reply">Reply</a>
                                            </div>
                                            <p>Consectetur adipiscing elit. Praesent vel tortor facilisis, Nullam vel orci dui. Su spendisse sit amet laoreet neque.</p>
                                        </div>
                                    </div>
                                </li>
                            </ol>
                        </li>

                        <!-- Single Comment Area -->
                        <li class="single_comment_area">
                            <!-- Comment Content -->
                            <div class="comment-content d-flex">
                                <!-- Comment Author -->
                                <div class="comment-author">
                                    <img src="img/bg-img/32.jpg" alt="author">
                                </div>
                                <!-- Comment Meta -->
                                <div class="comment-meta">
                                    <div class="d-flex">
                                        <a href="#" class="post-author">Lisa Moore</a>
                                        <a href="#" class="post-date">June 23, 2018</a>
                                        <a href="#" class="reply">Reply</a>
                                    </div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent vel tortor facilisis, volutpat nulla placerat, tincidunt mi. Nullam vel orci dui. Su spendisse sit amet laoreet neque. Fusce sagittis suscipit.</p>
                                </div>
                            </div>
                        </li>
                    </ol>
                </div>

                <div class="post-a-comment-area mb-30 clearfix">
                    <h4 class="mb-50">Leave a reply</h4>

                    <!-- Reply Form -->
                    <div class="contact-form-area">
                        <form action="#" method="post">
                            <div class="row">
                                <div class="col-12 col-lg-6">
                                    <input type="text" class="form-control" id="name" placeholder="Name*">
                                </div>
                                <div class="col-12 col-lg-6">
                                    <input type="email" class="form-control" id="email" placeholder="Email*">
                                </div>
                                <div class="col-12">
                                    <input type="text" class="form-control" id="subject" placeholder="Website">
                                </div>
                                <div class="col-12">
                                    <textarea name="message" class="form-control" id="message" cols="30" rows="10" placeholder="Message"></textarea>
                                </div>
                                <div class="col-12">
                                    <button class="btn newsbox-btn mt-30" type="submit">Submit Comment</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Sidebar Widget -->
            <div class="col-12 col-sm-9 col-md-6 col-lg-4">
                <div class="sidebar-area">

               

                </div>
            </div>
        </div>
    </div>
</section>
{{-- end  --}}
@endsection