@php
    $topPosts = DB::table('posts')
                ->orderBy('view' , 'DESC')
                ->limit(3)
                ->get();
@endphp
<section class="breaking-news-area">
   
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <!-- Breaking News Widget -->
                <div class="breaking-news-ticker d-flex flex-wrap align-items-center">
                    <div class="title">
                        <h6>Tin mới nhất</h6>
                    </div>
                    <div id="breakingNewsTicker" class="ticker">
                        <ul>
                            @foreach ($topPosts as $item)
                            <li><a href="{{url('/title',$item->id)}}">{{$item->title}}</a></li>
                            @endforeach
                          
                            {{-- <li><a href="#">Hà Nội dự kiến có thêm 30.000 căn nhà ở xã hội</a></li>
                            <li><a href="#">Nhiều sân bay gián đoạn vì dịch vụ đám mây Microsoft gặp sự cố</a></li> --}}
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>