@extends ('backend.cms.base')

@section ('title', trans('labels.backend.cms.article.management') . ' | ' . trans('labels.backend.cms.article.create'))

@section('page-header')
    <h1>
        {{ trans('labels.backend.cms.article.management') }}
        <small>{{ trans('labels.backend.cms.article.create') }}</small>
    </h1>
@endsection

@section('after-styles-end')
    @parent
    <style>
        .bootstrap-tagsinput {
            width: 100%;
            color: #555;
            background-color: #fff;
            background-image: none;
            border-color: #d2d6de;
            border-radius: 0 !important;
            box-shadow: none;
        }
    </style>
@stop

@section('content')
    {!! Form::open(['route' => 'admin.cms.articles.store', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post']) !!}

        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">{{ trans('labels.backend.cms.article.create') }}</h3>
            </div><!-- /.box-header -->

            <div class="box-body">
                <div class="form-group">
                    {!! Form::label('title', trans('validation.attributes.backend.cms.article.title'), ['class' => 'col-lg-2 control-label']) !!}
                    <div class="col-lg-10">
                        {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.cms.article.title'), 'autofocus'=>true]) !!}
                    </div>
                </div><!--form control-->

                <div class="form-group">
                    {!! Form::label('cover', trans('validation.attributes.backend.cms.article.cover'), ['class' => 'col-lg-2 control-label']) !!}
                    <div class="col-lg-10">
                        {!! Form::file('coverImg', ['class' => 'form-control update-file', "data-preview-file-type" => "text"]) !!}
                    </div>
                </div><!--form control-->

                <div class="form-group">
                    {!! Form::label('country', trans('validation.attributes.backend.cms.article.country'), ['class' => 'col-lg-2 control-label']) !!}
                    <div class="col-lg-10">
                        {!! Form::text('country', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.cms.article.country')]) !!}
                    </div>
                </div><!--form control-->

                <div class="form-group">
                    {!! Form::label('year', trans('validation.attributes.backend.cms.article.year'), ['class' => 'col-lg-2 control-label']) !!}
                    <div class="col-lg-10">
                        {!! Form::date('year', \Carbon\Carbon::now()->year, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.cms.article.year'), 'data-provide'=>'datepicker', 'data-date-format'=>'yyyy']) !!}
                    </div>
                </div><!--form control-->

                <div class="form-group">
                    {!! Form::label('release_date', trans('validation.attributes.backend.cms.article.release_date'), ['class' => 'col-lg-2 control-label']) !!}
                    <div class="col-lg-10">
                        {!! Form::date('release_date', \Carbon\Carbon::now(), ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.cms.article.release_date')]) !!}
                    </div>
                </div><!--form control-->

                <div class="form-group">
                    {!! Form::label('director', trans('validation.attributes.backend.cms.article.director'), ['class' => 'col-lg-2 control-label']) !!}
                    <div class="col-lg-10">
                        {!! Form::text('director', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.cms.article.director'), 'data-role'=>'tagsinput']) !!}
                    </div>
                </div><!--form control-->

                <div class="form-group">
                    {!! Form::label('actors', trans('validation.attributes.backend.cms.article.actors'), ['class' => 'col-lg-2 control-label']) !!}
                    <div class="col-lg-10">
                        {!! Form::text('actors', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.cms.article.actors'), 'data-role'=>'tagsinput']) !!}
                    </div>
                </div><!--form control-->

                <div class="form-group">
                    {!! Form::label('content', trans('validation.attributes.backend.cms.article.content'), ['class' => 'col-lg-2 control-label']) !!}
                    <div class="col-lg-10">
                        <div id="test-editormd">
                            <textarea id="editor" name="content" ></textarea>
                        </div>
                    </div>
                </div><!--form control-->

                <div class="form-group">
                    {!! Form::label('status', trans('validation.attributes.backend.cms.article.status'), ['class' => 'col-lg-2 control-label']) !!}
                    <div class="col-lg-10">
                        {!! Form::checkbox('status', 1, ['class' => 'form-control']) !!}
                    </div>
                </div><!--form control-->

            </div><!-- /.box-body -->
        </div><!--box-->

        <div class="box box-info">
            <div class="box-body">
                <div class="pull-left">
                    <a href="{{route('admin.cms.articles.index')}}" class="btn btn-danger btn-xs">{{ trans('buttons.general.cancel') }}</a>
                </div>

                <div class="pull-right">
                    <input type="submit" class="btn btn-success btn-xs" value="{{ trans('buttons.general.crud.create') }}" />
                </div>
                <div class="clearfix"></div>
            </div><!-- /.box-body -->
        </div><!--box-->

        {!! Form::hidden('cover', null, ['class' => 'form-control']) !!}
    {!! Form::close() !!}
@stop

