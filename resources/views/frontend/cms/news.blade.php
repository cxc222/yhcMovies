@extends('frontend.layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <div class="white-div">
                    <h4 style="padding:6px 20px 0px 20px;">最新电影</h4>
                    <ul class="list-unstyled mlist">
                        @foreach ($articles as $article)
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
                                            @foreach ($article->type as $type)
                                                <span class="label label-primary">{{ $type }}</span>&nbsp;
                                            @endforeach
                                        </p>
                                        <p>({{ $article->country }}) <strong>导演：</strong>{{ $article->director }} <strong>主演：</strong>{{ $article->actors }}</p>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </li>
                        @endforeach

                    </ul>
                    <nav class="text-center">
                        {{ $articles->links() }}
                    </nav>
                </div>
            </div>
            <div class="col-md-1"></div>
        </div>
    </div>
@endsection

@section('after-scripts-end')

@stop
