@extends('frontend.layouts.master')

@section('title')
    {!! $article->title !!}-{{ app_name() }}
@endsection

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
                                    {{ Carbon::parse($article->release_date)->toDateString() }}
                                @endif
                                <br>
                                <strong>语言：</strong>{{ $article->language }}<br>
                                <strong>片长：</strong>{{ $article->film_long }}<br>
                                <strong>国家：</strong>{{ $article->country }}<br>
                                <strong>剧情简介：</strong>{!! $article->content !!}<br>

                                <div class="bdsharebuttonbox"><a href="#" class="bds_more" data-cmd="more"></a><a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a><a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a><a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a><a href="#" class="bds_renren" data-cmd="renren" title="分享到人人网"></a><a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a></div>
                                <script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"1","bdSize":"16"},"share":{},"image":{"viewList":["qzone","tsina","tqq","renren","weixin"],"viewText":"分享到：","viewSize":"16"}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>
                            </div>
                        </div>
                        <div class="panel panel-default" style="margin-top:10px;" id="down4">
                            <div class="panel-heading">
                                下载地址
                            </div>
                            <div class="panel-body">
                                <div class="form-group">
                                    <p class="bg-warning">如点击"本地高速下载"没有反应, 请右键复制下载地址, 用迅雷下载!</p>
                                    <br/>
                                    <a class="label label-warning" id="normal_link" title="{!! $article->title !!}"
                                       href="{!! $article->down_url !!}">本地高速下载</a>
                                    <a class="label label-primary" id="xf_link" title="{!! $article->title !!}" onclick="XFLIB.startDownload(this,event)"
                                       qhref="{!! $article->down_url_cyclone !!}" href="javascript:void(0);">旋风专用下载</a>
                                    <a class="label label-info" id="xl_link"
                                       title="{!! $article->title !!}" onclick=xldown({!! $article->down_url_xunlei !!})
                                       oncontextmenu="ThunderNetwork_SetHref(this)" href="javascript:void(0);">迅雷专用下载</a>
                                </div>
                                <div class="form-group">
                                    <div class="input-group col-xs-12">
                                        <input type="text" id="down_url_text" class="form-control input-sm" value="{!! $article->down_url !!}">
                                        <span class="input-group-btn">
                                            <button class="btn btn-warning btn-sm" id="copyUrl" data-clipboard-text="{!! $article->down_url !!}">
                                                <i class="fa fa-clipboard"></i>
                                            </button>
                                        </span>
                                    </div>
                                </div>
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

        var clipboard = new Clipboard('#copyUrl'), downUrlText = $("#down_url_text");
        downUrlText.click(function(){
            $(this).select();
        });
        clipboard.on('success', function(e) {
            e.clearSelection();
            downUrlText.click();
            //
        });
    </script>
@stop
