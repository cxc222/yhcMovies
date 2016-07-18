@extends('frontend.layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <div class="white-div">
                    <h4 style="padding:6px 20px 0px 20px;">类型 "{{ $tag }}"</h4>
                    <ul class="list-unstyled mlist">
                        @foreach ($articles as $article)
                            @include('frontend.cms.includes.item')
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