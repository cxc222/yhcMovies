@extends('frontend.layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="white-div">
                    <h4 style="padding:6px 20px 0px 20px;">最新动态</h4>
                    <ul class="list-unstyled mlist">
                        @foreach ($articles as $article)
                        <li>
                            <a href="{!! route('cms.detail', ['id' => $article->id ]) !!}" target="_blank">
                                {!! $article->title !!}
                            </a>
                            @foreach ($article->typeArray as $type)
                                <span style="padding:1px 3px;" class="label label-primary">{{ $type }}</span>&nbsp;
                            @endforeach
                            @if ($article->douban_rating)
                                <span class="text-danger">
                                    <img src="https://img3.doubanio.com/pics/douban-icons/favicon_16x16.png" />
                                    {{ $article->douban_rating }}
                                </span>
                            @endif
                            <br>
                            <small class="text-muted">导演：{!! $article->director !!}</small>
                            <small class="text-muted">演员：{!! $article->actors !!}</small>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="col-md-4">
                {{--<div class="white-div">
                    <h4 style="padding:6px 20px 0px 20px;">Tags</h4>
                    <ul class="list-inline tags">
                        <li><a href="/tag/喜剧">喜剧</a></li>
                        <li><a href="/tag/剧情">剧情</a></li>
                        <li><a href="/tag/动画">动画</a></li>
                        <li><a href="/tag/奇幻">奇幻</a></li>
                        <li><a href="/tag/爱情">爱情</a></li>
                        <li><a href="/tag/动作">动作</a></li>
                        <li><a href="/tag/历史">历史</a></li>
                        <li><a href="/tag/犯罪">犯罪</a></li>
                        <li><a href="/tag/惊悚">惊悚</a></li>
                        <li><a href="/tag/家庭">家庭</a></li>
                        <li><a href="/tag/科幻">科幻</a></li>
                        <li><a href="/tag/悬疑">悬疑</a></li>
                        <li><a href="/tag/冒险">冒险</a></li>
                        <li><a href="/tag/恐怖">恐怖</a></li>
                        <li><a href="/tag/灾难">灾难</a></li>
                        <li><a href="/tag/运动">运动</a></li>
                        <li><a href="/tag/情色">情色</a></li>
                        <li><a href="/tag/战争">战争</a></li>
                        <li><a href="/tag/传记">传记</a></li>
                        <li><a href="/tag/音乐">音乐</a></li>
                        <li><a href="/tag/西部">西部</a></li>
                        <li><a href="/tag/纪录片">纪录片</a></li>
                        <li><a href="/tag/同性">同性</a></li>
                        <li><a href="/tag/儿童">儿童</a></li>
                        <li><a href="/tag/Comedy">Comedy</a></li>
                        <li><a href="/tag/Romance">Romance</a></li>
                        <li><a href="/tag/古装">古装</a></li>
                        <li><a href="/tag/武侠">武侠</a></li>
                        <li><a href="/tag/短片">短片</a></li>
                        <li><a href="/tag/歌舞">歌舞</a></li>
                        <li><a href="/tag/黑色电影">黑色电影</a></li>
                        <li><a href="/tag/惊栗">惊栗</a></li>
                        <li><a href="/tag/Reality-TV">Reality-TV</a></li>
                        <li><a href="/tag/戏曲">戏曲</a></li>
                        <li><a href="/tag/真人秀">真人秀</a></li>
                    </ul>
                </div>
                <div class="white-div">
                    <h4 style="padding:6px 20px 0px 20px;">本周高分榜</h4>
                    <ol class="db-rank">
                        <li><a href="/movie/6934">解放</a> <span class="text-danger">8.5分</span></li>
                        <li><a href="/movie/6935">天空之眼</a> <span class="text-danger">8.3分</span></li>
                        <li><a href="/movie/6940">局内人</a> <span class="text-danger">7.5分</span></li>
                        <li><a href="/movie/6936">致命呼叫</a> <span class="text-danger">7.3分</span></li>
                        <li><a href="/movie/6932">小花的味噌汤  电影版</a> <span class="text-danger">7.2分</span></li>
                        <li><a href="/movie/6929">老笠</a> <span class="text-danger">7.1分</span></li>
                        <li><a href="/movie/6930">杉原千亩</a> <span class="text-danger">6.8分</span></li>
                        <li><a href="/movie/6938">梦醒之前</a> <span class="text-danger">6.5分</span></li>
                        <li><a href="/movie/6928">荒唐六蛟龙</a> <span class="text-danger">5.9分</span></li>
                        <li><a href="/movie/6942">求职记</a> <span class="text-danger">5.4分</span></li>
                    </ol>
                </div>--}}
            </div>
        </div><!--row-->
    </div><!-- container -->
@endsection

@section('after-scripts-end')
    <script>
        $(function () {

        });
    </script>
@stop