<li>
    <div class="row">
        <div class="col-md-2">
            <a href="{!! route('cms.detail', ['id' => $article->id ]) !!}" target="_blank" class="thumbnail" style="margin-bottom: 0px;">
                <img src="{!! $article->cover !!}" alt="{!! $article->title !!}" title="{!! $article->title !!}">
            </a>
        </div>
        <div class="col-md-10 clearfix">
            <h4>
                <span class="glyphicon glyphicon-film" aria-hidden="true"></span>
                <a href="{!! route('cms.detail', ['id' => $article->id ]) !!}" target="_blank">{!! $article->title !!}</a>
            </h4>
            <p class="mdes">
                <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
                @if($article->release_date)
                    {{ Carbon::parse($article->release_date)->toDateString() }}
                @endif
                &nbsp;
                <span class="glyphicon glyphicon-tag" aria-hidden="true"></span>
                @foreach ($article->typeArray as $type)
                    <a href="{!! route('cms.search.tag', ['tag' => $type ]) !!}" target="_blank">
                        <span class="label label-primary">{{ $type }}</span>
                    </a>
                   &nbsp;
                @endforeach
                @if ($article->douban_rating)<i class="iconfont icon-ren text-success" title="豆瓣评分">{{ $article->douban_rating }}</i>@endif
                @if ($article->imdb_rating)<i class="iconfont icon-imdb text-primary" title="IMDB评分"> {{ $article->imdb_rating }}</i>@endif
                <br />
                <strong>地区：</strong>{{ $article->country }}
                <br />
                <strong>导演：</strong>{{ $article->director }}
                <br/>
                <strong>主演：</strong>{{ $article->actors }}
            </p>
        </div>
    </div>
</li>