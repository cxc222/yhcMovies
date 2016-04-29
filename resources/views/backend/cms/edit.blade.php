@extends ('backend.cms.base')

@section ('title', trans('labels.backend.cms.article.management') . ' | ' . trans('labels.backend.cms.article.edit'))

@section('page-header')
    <h1>
        {{ trans('labels.backend.cms.article.management') }}
        <small>{{ trans('labels.backend.cms.article.edit') }}</small>
    </h1>
@endsection

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
                    {!! Form::label('cover', trans('validation.attributes.backend.cms.article.cover'), ['class' => 'col-lg-2 control-label']) !!}
                    <div class="col-lg-10">
                        {!! Form::file('coverImg', ['class' => 'form-control update-file', "data-preview-file-type" => "text"]) !!}
                    </div>
                </div><!--form control-->

                <div class="form-group">
                    {!! Form::label('country', trans('validation.attributes.backend.cms.article.country'), ['class' => 'col-lg-2 control-label']) !!}
                    <div class="col-lg-10">
                        {!! Form::text('country', $article->country, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.cms.article.country')]) !!}
                    </div>
                </div><!--form control-->

                <div class="form-group">
                    {!! Form::label('year', trans('validation.attributes.backend.cms.article.year'), ['class' => 'col-lg-2 control-label']) !!}
                    <div class="col-lg-10">
                        {!! Form::date('year', $article->year, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.cms.article.year'), 'data-provide'=>'datepicker', 'data-date-format'=>'yyyy']) !!}
                    </div>
                </div><!--form control-->

                <div class="form-group">
                    {!! Form::label('release_date', trans('validation.attributes.backend.cms.article.release_date'), ['class' => 'col-lg-2 control-label']) !!}
                    <div class="col-lg-10">
                        {!! Form::date('release_date', $article->release_date, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.cms.article.release_date')]) !!}
                    </div>
                </div><!--form control-->

                <div class="form-group">
                    {!! Form::label('director', trans('validation.attributes.backend.cms.article.director'), ['class' => 'col-lg-2 control-label']) !!}
                    <div class="col-lg-10">
                        {!! Form::text('director', $article->director, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.cms.article.director'), 'data-role'=>'tagsinput']) !!}
                    </div>
                </div><!--form control-->

                <div class="form-group">
                    {!! Form::label('actors', trans('validation.attributes.backend.cms.article.actors'), ['class' => 'col-lg-2 control-label']) !!}
                    <div class="col-lg-10">
                        {!! Form::text('actors', $article->actors, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.cms.article.actors'), 'data-role'=>'tagsinput']) !!}
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

        {!! Form::hidden('cover', $article->cover, ['class' => 'form-control']) !!}
    {!! Form::close() !!}
@stop