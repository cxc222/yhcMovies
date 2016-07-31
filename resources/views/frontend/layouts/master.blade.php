<!DOCTYPE html>
<html lang="zh-cmn-Hans">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="renderer" content="webkit" />
        <meta http-equiv="Cache-Control" content="no-siteapp" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="_token" content="{{ csrf_token() }}" />
        <meta name="ujianVerification" content="9bf1e5c21e2af1ae03205a9ed6256e9e" />
        <title>@yield('title', app_name())</title>
        <!-- Meta -->
        <meta name="keywords" content="@yield('meta_author', config('frontend.seoKeyWords'))" />
        <meta name="description" content="@yield('meta_description', config('frontend.seoDescription'))" />
        <meta name="apple-mobile-web-app-title" content="@yield('title', app_name())" />
        @yield('meta')
        <!-- Styles -->
        <link href="https://cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        @yield('before-styles-end')
        {!! Html::style(elixir('css/frontend.css')) !!}
        @yield('after-styles-end')
        <!-- Fonts -->
        <link href="https://cdn.bootcss.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" />
        <link href="http://at.alicdn.com/t/font_1469879971_8476088.css" rel="stylesheet" />
    </head>
    <body>
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                @include('frontend.includes.header')
            </div>
        </nav>

        {{--@include('includes.partials.messages')--}}
        @yield('content')

        @include('frontend.includes.footer')

        <!-- JavaScripts -->
        <script src="//cdn.bootcss.com/jquery/2.1.4/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="{{asset('js/vendor/jquery/jquery-2.1.4.min.js')}}"><\/script>')</script>
        {!! Html::script('js/vendor/bootstrap/bootstrap.min.js') !!}

        @yield('before-scripts-end')
        {!! Html::script(elixir('js/frontend.js')) !!}
        @yield('after-scripts-end')

        @include('includes.partials.ga')
    </body>
</html>