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
                                    <img src="{{ $article->cover }}" alt="{!! $article->title !!}" title="{!! $article->title !!}">
                                </div>
                            </div>
                            <div class="col-md-8" style="padding-right:20px;line-height: 25px;">
                                <h3 style="margin-top:0px;">{!! $article->title !!}</h3>
                                <strong>导演：</strong>{{ $article->director }}<br>
                                <strong>主演：</strong>{{ $article->actors }}<br>
                                <strong>上映时间：</strong>
                                @if($article->release_date)
                                    {{ $article->release_date }}
                                @endif<br>
                                <strong>语言：</strong>{{ $article->language }}<br>
                                <strong>片长：</strong>{{ $article->film_long }}<br>
                                <strong>国家：</strong>{{ $article->country }}<br>
                                <strong>剧情简介：</strong>{!! $article->content !!}<br>
                            </div>
                        </div>
                        <div class="panel panel-default" style="margin-top:10px;" id="down4">
                            <div class="panel-heading">
                                下载地址
                            </div>
                            <div class="panel-body">
                                <a class="label label-warning" id="normal_link" title="{!! $article->title !!}"
                                   href="{!! $article->down_url !!}">本地高速下载</a>
                                <a class="label label-primary" id="xf_link" title="{!! $article->title !!}" onclick="XFLIB.startDownload(this,event)"
                                   qhref="{!! $article->down_url_cyclone !!}" href="javascript:void(0);">旋风专用下载</a>
                                <a class="label label-info" id="xl_link"
                                   title="{!! $article->title !!}" onclick=xldown({!! $article->down_url_xunlei !!})
                                   oncontextmenu="ThunderNetwork_SetHref(this)" href="javascript:void(0);">迅雷专用下载</a>
                            </div>
                        </div>

                        <!-- UY BEGIN -->
                        <div id="uyan_frame"></div>
                        <script type="text/javascript" src="http://v2.uyan.cc/code/uyan.js?uid=1709980"></script>
                        <!-- UY END -->
                    </div>
                </div>
                <div class="col-md-1"></div>
            </div>
        </div>
    </div>
@endsection

@section('after-scripts-end')
    <script type="text/javascript" src="http://x.xf.qq.com/js/xf/xflib2.0.js"></script>
    <script src="http://pstatic.xunlei.com/js/webThunderDetect.js"></script>
    <script src="http://pstatic.xunlei.com/js/base64.js"></script>
    <script type="text/javascript">
        var xlPid = "123456",
                xlUrl = "{!! $article->down_url_xunlei !!}";
        function xldown(linkObj){
            var link = ThunderEncode(linkObj);
            OnDownloadClick(link,'',location.href,'0',2,'');
        };
    </script>
@stop
