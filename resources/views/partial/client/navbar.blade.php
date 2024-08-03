<!-- Preloader -->
@php(
$categories = DB::table('categories')->get()
)

<div class="preloader d-flex align-items-center justify-content-center">
    <div class="lds-ellipsis">
        <div></div>
        <div></div>
        <div></div>
        <div></div>
    </div>
</div>

@if (Auth::check())
    <div class="login-register-area">
        <span style="margin-top: 10px" class="welcome-message">Xin chào, {{ Auth::user()->name }}!</span>
        <a href="{{ route('logout') }}" class="login-register-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="fas fa-sign-out-alt"></i> Đăng xuất
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>
@else
    <div class="login-register-area">
        <a href="{{ route('showRegister') }}" class="login-register-link"><i class="fas fa-user-plus"></i> Đăng kí</a>
        <a href="{{ route('showLogin') }}" class="login-register-link"><i class="fas fa-sign-in-alt"></i> Đăng nhập</a>
    </div>
@endif

<!-- ##### Header Area Start ##### -->
<header class="header-area">
    <!-- Navbar Area -->
    <div class="newsbox-main-menu">
        <div class="classy-nav-container breakpoint-off">
            <div class="container-fluid">
                <!-- Menu -->
                <nav class="classy-navbar justify-content-between" id="newsboxNav">

                    <!-- Nav brand -->
                    <a href="{{route('post.index')}}" class="nav-brand"><img src="{{asset('asset/img/core-img/logo.png')}}" alt=""></a>

                    <!-- Navbar Toggler -->
                    <div class="classy-navbar-toggler">
                        <span class="navbarToggler"><span></span><span></span><span></span></span>
                    </div>

                    <!-- Menu -->
                    <div class="classy-menu">

                        <!-- Close Button -->
                        <div class="classycloseIcon">
                            <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                        </div>

                        <!-- Nav Start -->
                        <div class="classynav">
                            <ul>
                                <li><a href="#">Trang chủ</a></li>
                                <li><a href="{{route('category.showAll')}}">Tin tức</a>
                                    <ul class="dropdown">
                                        @foreach ($categories as $item)
                                            <li><a href="{{ route('category.show', ['slug' => $item->slug]) }}">{{ $item->name }}</a></li>
                                        @endforeach
                                    </ul>
                                </li>
                                <li><a href="#">Giới thiệu</a></li>
                                <li><a href="#">Liên Hệ</a></li>
                            </ul>
                            <!-- Header Add Area -->
                            <div class="header-add-area">
                                <form action="{{ route('search') }}" method="GET">
                                    <input type="text" name="keyword" class="search-input" placeholder="Search...">
                                    <button type="submit" class="search-button">Search</button>
                                </form>
                            </div>
                        </div>
                        <!-- Nav End -->

                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>
