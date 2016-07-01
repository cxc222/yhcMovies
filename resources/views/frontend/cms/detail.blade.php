@extends('frontend.layouts.master')

@section('content')
    <div class="container">
        <div class="container_back clearfix">
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <div class="white-div" style="padding:8px 20px 20px 20px;margin-top:10px;">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="thumbnail">
                                    <img src="/static/mpic/2016-06/p2336879104.jpg" alt="{!! $article->title !!}" title="{!! $article->title !!}">
                                </div>
                            </div>
                            <div class="col-md-8" style="padding-right:20px;line-height: 25px;">
                                <h3 style="margin-top:0px;">{!! $article->title !!}</h3>
                                <strong>原名：</strong>我们毕业啦<br>
                                <strong>又名：</strong>Our graduation<br>
                                <strong>评分：</strong><span class="text-danger">2.7</span><br>
                                <strong>导演：</strong>{{ $article->director }}<br>
                                <strong>编剧：</strong>宋光振 Guangzhen Song / 汪俞岑 Yucen Wang<br>
                                <strong>主演：</strong>{{ $article->actors }}<br>
                                <strong>影片年代：</strong>{{ $article->year }}<br>
                                <strong>上映时间：</strong>
                                @if(!empty($article->release_date))
                                    {{ $article->release_date }}
                                @endif<br>
                                <strong>语言：</strong>汉语普通话<br>
                                <strong>片长：</strong>95分钟<br>
                                <strong>国家：</strong>{{ $article->country }}<br>
                                <strong>短评数：</strong><a href="http://movie.douban.com/subject/26775951/comments">185</a><br>
                                <strong>影评数：</strong><a href="http://movie.douban.com/subject/26775951/reviews">4</a><br>
                                <strong>剧情简介：</strong>{!! $article->content !!}<br>
                            </div>
                        </div>
                        <div class="quick-resource">
                            <h4>下载通道</h4>
                            <ul class="list-inline">
                                <li><a href="#down4"><span class="label label-primary">
                            种子下载
                                                        </span></a></li>
                                <li><a href="#down5"><span class="label label-primary">
                            磁力链接
                                                        </span></a></li>
                            </ul>
                        </div>
                        <div class="panel panel-default" style="margin-top:10px;" id="down4">
                            <div class="panel-heading">
                                种子下载资源
                            </div>
                            <div class="panel-body">
                                <ul class="list-unstyled">
                                    <li class="resource-list" style="overflow-x: auto;">
                                        <a href="http://www.mp4ba.com/down.php?date=1467211557&amp;hash=3019cb18908f87077fc24c5b1373142bd7fcf53c">http://www.mp4ba.com/down.php?date=1467211557&amp;hash=3019cb18908f87077fc24c5b1373142bd7fcf53c</a><br>
                                        <span></span> <small>本资源由 管理员 于 12小时前 </small>
                                    </li>
                                    <li class="resource-list" style="overflow-x: auto;">
                                        <a href="http://www.mp4ba.com/down.php?date=1467211521&amp;hash=26e6d627d544cf7f46976e4c17b1f85470419421">http://www.mp4ba.com/down.php?date=1467211521&amp;hash=26e6d627d544cf7f46976e4c17b1f85470419421</a><br>
                                        <span></span> <small>本资源由 管理员 于 12小时前 </small>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="panel panel-default" style="margin-top:10px;" id="down5">
                            <div class="panel-heading">
                                磁力链接，可把资源离线到各种云盘或者使用迅雷影音等支持种子加载的播放器在线观看
                            </div>
                            <div class="panel-body">
                                <ul class="list-unstyled">
                                    <li class="resource-list" style="overflow-x: auto;">
                                        <a href="magnet:?xt=urn:btih:3019cb18908f87077fc24c5b1373142bd7fcf53c&amp;tr=http://bt.mp4ba.com:2710/announce">magnet:?xt=urn:btih:3019cb18908f87077fc24c5b1373142bd7fcf53c&amp;tr=http://bt.mp4ba.com:2710/announce</a><br>
                                        <span></span> <small>本资源由 管理员 于 12小时前 </small>
                                    </li>
                                    <li class="resource-list" style="overflow-x: auto;">
                                        <a href="magnet:?xt=urn:btih:26e6d627d544cf7f46976e4c17b1f85470419421&amp;tr=http://bt.mp4ba.com:2710/announce">magnet:?xt=urn:btih:26e6d627d544cf7f46976e4c17b1f85470419421&amp;tr=http://bt.mp4ba.com:2710/announce</a><br>
                                        <span></span> <small>本资源由 管理员 于 12小时前 </small>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-1"></div>
            </div>
        </div>
    </div>
@endsection