@extends ('backend.layouts.master')

@section ('title', trans('labels.backend.cms.category.management'))

@section('page-header')
<h1>
    {{ trans('labels.backend.cms.category.management') }}
    <small>{{ trans('labels.backend.cms.category.list') }}</small>
</h1>
@endsection

@section('after-styles-end')
    {!! Html::style(elixir('css/backend_plugin_1.css')) !!}
@endsection

@section('content')
<div class="box box-success">
    <div class="box-header with-border">
        <h3 class="box-title">{{ trans('labels.backend.cms.category.list') }}</h3>
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal">{{ trans('labels.backend.cms.category.create') }}</button>
        </div>
    </div><!-- /.box-header -->

    <div class="box-body">
        <div id="treeview"></div>
        <div class="clearfix"></div>
    </div><!-- /.box-body -->
</div><!--box-->

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">新建分类</h4>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                <button type="button" class="btn btn-primary">保存</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('after-scripts-end')
    {!! Html::script(elixir('js/backend_plugin_1.js')) !!}
    <script type="text/javascript">
        $(function() {
            var defaultData = '{!! $list !!}';
            $('#treeview').treeview({
                data: defaultData,
                showIcon: false
            });
        });
    </script>
@endsection
