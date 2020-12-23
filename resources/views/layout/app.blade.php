<!DOCTYPE html>
<html lang="en">
<head>
    @include('common.head')
</head>
<body>
@include('common.page-header')
<div class="container" id="container">
    @yield('content')
</div>
@include('common.footer')
@include('common.js')
</body>
</html>
