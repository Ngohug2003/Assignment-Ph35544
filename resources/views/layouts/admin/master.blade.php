@include('partial.admin.header')
@include('partial.admin.boxleft')

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Topbar -->
        @include('partial.admin.topbar')
        @yield('content')
        @include('partial.admin.footer')
