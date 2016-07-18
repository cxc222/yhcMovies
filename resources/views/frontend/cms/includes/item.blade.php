<li>
    <div class="row">
        <div class="col-md-2">
            <div class="thumbnail">
                <a href="{!! route('cms.detail', ['id' => $article->id ]) !!}" target="_blank">
                    <img src="{!! $article->cover !!}" alt="{!! $article->title !!}" title="{!! $article->title !!}">
                </a>
            </div>
        </div>
        <div class="col-md-10">
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
                <br />
                <strong>地区：</strong>{{ $article->country }}
                <br />
                <strong>导演：</strong>{{ $article->director }}
                <br/>
                <strong>主演：</strong>{{ $article->actors }}
            </p>
        </div>
        <div class="clearfix"></div>
    </div>
</li>