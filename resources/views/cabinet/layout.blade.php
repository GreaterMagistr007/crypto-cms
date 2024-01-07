<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('cabinet.blocks.head')
<body class="header-fix fix-sidebar">
    <div id="main-wrapper">
        @include('cabinet.blocks.header')
        @include('cabinet.blocks.left-sidebar')
        <div class="page-wrapper">
            <div class="row page-titles">
                @include('cabinet.blocks.page-title')
                @include('cabinet.blocks.breadcrumb')
            </div>
            <div class="container-fluid">
                @include('cabinet.blocks.ticker')
                @yield('content')
            </div>
            @include('cabinet.blocks.footer')
        </div>
    </div>
    @include('cabinet.blocks.foot-scripts')
</body>
</html>
