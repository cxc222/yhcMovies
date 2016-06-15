@extends('frontend.layouts.master')

@section('content')
    <div class="container">
        <div class="container_back clearfix">
            <div class="row">
                <div class="col-md-12">
                    <div class="content clearfix">
                        <div class="col-md-12">
                            <h1 class="headTitle">{!! $article->title !!}</h1>
                        </div>
                        <div class="col-md-9">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="movie_image">
                                        <img src="uploads/single.jpg" class="img-responsive center-block"/>
                                    </div>
                                    <div class="movie_rate">
                                        <div class="rating_desc"><p>Your Vote :</p></div>
                                    </div>
                                </div>

                                <div class="movie_option col-md-7">
                                    <p class="movie_option">
                                        <strong>制片国家/地区: </strong>
                                        {{ $article->country }}
                                        <a href="#">established</a>, <a href="#">USA</a>
                                    </p>
                                    <p class="movie_option">
                                        <strong>年份: </strong>{{ $article->year }}
                                    </p>
                                    <p class="movie_option"><strong>类型: </strong><a href="#">Adventure</a>, <a href="#">Fantazy</a></p>
                                    <p class="movie_option"><strong>上映日期: </strong>
                                        @if(!empty($article->release_date))
                                            {{ $article->release_date }}
                                        @endif
                                    </p>
                                    <p class="movie_option"><strong>导演: </strong>{{ $article->director }}</p>
                                    <p class="movie_option"><strong>主演: </strong>{{ $article->actors }}</p>
                                    <div class="down_btn">
                                        <a class="btn1" href="#"><span class="glyphicon glyphicon-download-alt"></span> 资源下载</a>
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-12 contentHtml">
                                    {!! $article->content !!}
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            213
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection