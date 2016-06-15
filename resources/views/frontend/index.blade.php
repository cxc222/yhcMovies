@extends('frontend.layouts.master')

@section ('title')
月河城-电影驿站
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="slider container_back">
                    <div class="callbacks_container">
                        <ul class="rslides" id="slider">
                            <li><img src="uploads/banner.jpg" class="img-responsive" alt=""/>
                                <div class="button">
                                    <a href="#" class="hvr-shutter-out-horizontal">Watch Now</a>
                                </div>
                            </li>
                            <li><img src="uploads/banner1.jpg" class="img-responsive" alt=""/>
                                <div class="button">
                                    <a href="#" class="hvr-shutter-out-horizontal">Watch Now</a>
                                </div>
                            </li>
                            <li><img src="uploads/banner2.jpg" class="img-responsive" alt=""/>
                                <div class="button">
                                    <a href="#" class="hvr-shutter-out-horizontal">Watch Now</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="banner_desc">
                        <div class="col-md-9">
                            <ul class="list_1">
                                <li>Published <span class="m_1">Feb 20, 2015</span></li>
                                <li>Updated <span class="m_1">Feb 20 2015</span></li>
                                <li>Rating <span class="m_1"><img src="uploads/rating.png" alt=""/></span></li>
                            </ul>
                        </div>
                        <div class="col-md-3 grid_1">
                            <ul class="list_1 list_2">
                                <li><i class="icon1"> </i><p>2,548</p></li>
                                <li><i class="icon2"> </i><p>215</p></li>
                                <li><i class="icon3"> </i><p>546</p></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--row-->
    </div><!-- container -->

    <div class="container">
        <div class="container_back clearfix">

            <div class="row">
                <div class="col-md-12">
                    <div class="box_1">
                        <h1 class="m_2">Featured movies</h1>
                        <div class="search">
                            <form>
                                <input type="text" value="Search..." onfocus="this.value='';" onblur="if (this.value == '') {this.value ='';}">
                                <input type="submit" value="">
                            </form>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                </div>
            </div>


            <div class="row grid_list">

                @foreach ($articles as $article)
                    <div class="col-md-3">
                        <div class="thumbnail grid_item">
                            <a href="{!! route('cms.detail', ['id' => $article->id ]) !!}" id="{!! $article->id !!}">
                                <img class="img-rounded" alt="{!! $article->title !!}" src="{!! $article->cover !!}" />
                            </a>
                            <p class="item_collect">
                                <span class="glyphicon glyphicon-heart"></span>
                                <strong>{!! $article->view_cnt !!}</strong>
                            </p>
                            <p class="item_down">
                                <span class="glyphicon glyphicon-download-alt"></span>
                            </p>
                            <p class="item_title">
                                {!! $article->title !!}
                            </p>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
@endsection

@section('after-scripts-end')

    <script>
        $(function () {
            $("#slider").responsiveSlides({
                auto: true,
                nav: true,
                speed: 500,
                namespace: "callbacks",
                pager: true,
            });
        });
    </script>
@stop