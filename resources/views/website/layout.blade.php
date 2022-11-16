<!DOCTYPE html>
<html>
<head>
    <!-- Basic -->
    @include('website.partials.css')
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body>
<div class="hero_area">
    @include('sweetalert::alert')
<!-- header section strats -->
    @include('website.partials.header')
    <!-- end header section -->
    @if(session()->has('message'))
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            <i class="fa fa-check me-2"></i>{{session()->get('message')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <!-- slider section -->
    @yield('content')

<!-- footer start -->
@include('website.partials.footer')
<!-- footer end -->

<!-- start script file -->
@include('website.partials.script')
<!-- end script file -->
</body>
</html>
