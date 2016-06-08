@extends ('backend.cms.category.base')

@section ('title', trans('labels.backend.cms.category.management') . ' | ' . trans('labels.backend.cms.category.create'))

@section('page-header')
    <h1>
        {{ trans('labels.backend.cms.category.management') }}
        <small>{{ trans('labels.backend.cms.category.create') }}</small>
    </h1>
@endsection

@section('content')
    {!! Form::open(['route' => 'admin.cms.categorys.store', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post']) !!}

        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">{{ trans('labels.backend.cms.category.create') }}</h3>
            </div><!-- /.box-header -->

            <div class="box-body">
                <div class="form-group">
                    {!! Form::label('name', trans('validation.attributes.backend.cms.category.name'), ['class' => 'col-lg-2 control-label']) !!}
                    <div class="col-lg-10">
                        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.cms.category.name'), 'autofocus'=>true]) !!}
                    </div>
                </div><!--form control-->

                <div class="form-group">
                    {!! Form::label('parentName', trans('validation.attributes.backend.cms.category.parent_name'), ['class' => 'col-lg-2 control-label']) !!}
                    <div class="col-lg-10">
                        {!! Form::select('pid', ['L' => 'Large', 'S' => 'Small'], null, ['class' => 'form-control']) !!}
                    </div>
                </div><!--form control-->

                <div class="form-group">
                    {!! Form::label('sort', trans('validation.attributes.backend.cms.category.sort'), ['class' => 'col-lg-2 control-label']) !!}
                    <div class="col-lg-10">
                        {!! Form::text('sort', 255, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.cms.category.sort'), 'autofocus'=>true]) !!}
                    </div>
                </div><!--form control-->

                <div class="form-group">
                    {!! Form::label('status', trans('validation.attributes.backend.cms.category.status'), ['class' => 'col-lg-2 control-label']) !!}
                    <div class="col-lg-10">
                        {!! Form::checkbox('status', 1, ['class' => 'form-control']) !!}
                    </div>
                </div><!--form control-->

            </div><!-- /.box-body -->
        </div><!--box-->

        <div class="box box-info">
            <div class="box-body">
                <div class="pull-left">
                    <a href="{{route('admin.cms.categorys.index')}}" class="btn btn-danger btn-xs">{{ trans('buttons.general.cancel') }}</a>
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

