<!DOCTYPE html>
<html>
<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="images/favicon.png" type="">
    <title>Famms - Fashion HTML Template</title>
    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="{{asset('front').'/css/bootstrap.css'}}" />
    <!-- font awesome style -->
    <link href="{{asset('front').'/css/font-awesome.min.css'}}" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="{{asset('front').'/css/style.css'}}" rel="stylesheet" />
    <!-- responsive style -->
    <link href="{{asset('front').'/css/responsive.css'}}" rel="stylesheet" />

    <style type="text/css">

        .card{
            border:none;
        }

        .form-control {
            border-bottom: 2px solid #eee !important;
            border: none;
            font-weight: 600
        }

        .form-control:focus {
            color: #495057;
            background-color: #fff;
            border-color: #8bbafe;
            outline: 0;
            box-shadow: none;
            border-radius: 0px;
            border-bottom: 2px solid blue !important;
        }



        .inputbox {
            position: relative;
            margin-bottom: 20px;
            width: 100%
        }

        .inputbox span {
            position: absolute;
            top: 7px;
            left: 11px;
            transition: 0.5s
        }

        .inputbox i {
            position: absolute;
            top: 13px;
            right: 8px;
            transition: 0.5s;
            color: #3F51B5
        }

        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0
        }

        .inputbox input:focus~span {
            transform: translateX(-0px) translateY(-15px);
            font-size: 12px
        }

        .inputbox input:valid~span {
            transform: translateX(-0px) translateY(-15px);
            font-size: 12px
        }

        .card-blue{
            background-color: #341ac7;
        }

        .hightlight{

            background-color: #5737d9;
            padding: 10px;
            border-radius: 10px;
            margin-top: 15px;
            font-size: 14px;
        }

        .yellow{
            color: #fdcc49;
        }

        .decoration{
            text-decoration: none;
            font-size: 14px;
        }
        .decoration:hover{

            text-decoration: none;
            color: #fdcc49;
        }

        .comment{
            margin-left: 284px;
            margin-bottom: 27px
        }
        .comment-box{
            height: 100px;
            width: 500px;
        }

        .reply{
            margin-left: -145px;
        }

        .reply-section{
            margin-left: 90px;
        }


    </style>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body>
<div class="hero_area">
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
