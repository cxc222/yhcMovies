@extends ('backend.layouts.master')

@section ('title', trans('labels.backend.cms.article.management') . ' | ' . trans('labels.backend.cms.article.edit'))

@section('page-header')
    <h1>
        {{ trans('labels.backend.cms.article.management') }}
        <small>{{ trans('labels.backend.cms.article.edit') }}</small>
    </h1>
@endsection

@section('after-styles-end')
    {!! Html::style('js/vendor/simditor/styles/simditor.css') !!}
@stop

@section('content')
    {!! Form::open(['route' => ['admin.cms.articles.update', $article->id], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'PATCH']) !!}

        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">{{ trans('labels.backend.cms.article.edit') }}</h3>
            </div><!-- /.box-header -->

            <div class="box-body">
                <div class="form-group">
                    {!! Form::label('title', trans('validation.attributes.backend.cms.article.title'), ['class' => 'col-lg-2 control-label']) !!}
                    <div class="col-lg-10">
                        {!! Form::text('title', $article->title, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.cms.article.title'), 'autofocus'=>true]) !!}
                    </div>
                </div><!--form control-->

                <div class="form-group">
                    {!! Form::label('content', trans('validation.attributes.backend.cms.article.content'), ['class' => 'col-lg-2 control-label']) !!}
                    <div class="col-lg-10">
                        <div id="test-editormd">
                            <textarea id="editor" name="content" >{!! $article->content !!}</textarea>
                        </div>
                    </div>
                </div><!--form control-->

                <div class="form-group">
                    {!! Form::label('status', trans('validation.attributes.backend.cms.article.status'), ['class' => 'col-lg-2 control-label']) !!}
                    <div class="col-lg-10">
                        <input type="checkbox" value="1" name="status" {{$article->status == 1 ? 'checked' : ''}} />
                    </div>
                </div><!--form control-->

            </div><!-- /.box-body -->
        </div><!--box-->

        <div class="box box-info">
            <div class="box-body">
                <div class="pull-left">
                    <a href="{{route('admin.access.users.index')}}" class="btn btn-danger btn-xs">{{ trans('buttons.general.cancel') }}</a>
                </div>

                <div class="pull-right">
                    <input type="submit" class="btn btn-success btn-xs" value="{{ trans('buttons.general.crud.create') }}" />
                </div>
                <div class="clearfix"></div>
            </div><!-- /.box-body -->
        </div><!--box-->

    {!! Form::close() !!}
@stop

@section('after-scripts-end')
    {!! Html::script('js/vendor/simditor/js/module.js') !!}
    {!! Html::script('js/vendor/simditor/js/hotkeys.js') !!}
    {!! Html::script('js/vendor/simditor/js/uploader.js') !!}
    {!! Html::script('js/vendor/simditor/js/simditor.js') !!}
    <script type="text/javascript">
        $(function() {
            var editor = new Simditor({
                textarea: $('#editor')
                //optional options
            });
        });
    </script>
@stop
