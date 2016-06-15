@extends ('backend.layouts.master')

@section ('title', trans('labels.backend.cms.category.management'))

@section('page-header')
<h1>
    {{ trans('labels.backend.cms.category.management') }}
    <small>{{ trans('labels.backend.cms.category.list') }}</small>
</h1>
@endsection

@section('after-styles-end')
    {!! Html::style(elixir('vendor/bootstrap-treeview/css/bootstrap-treeview.css')) !!}
@endsection

@section('content')
<div class="box box-success">
    <div class="box-header with-border">
        <h3 class="box-title">{{ trans('labels.backend.cms.category.list') }}</h3>
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#categoryModal">{{ trans('labels.backend.cms.category.create') }}</button>
        </div>
    </div><!-- /.box-header -->

    <div class="box-body">
        <div id="treeview"></div>
        <div class="clearfix"></div>
    </div><!-- /.box-body -->
</div><!--box-->

<div class="modal fade" id="categoryModal" tabindex="-1" role="dialog" aria-labelledby="category">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="category">新建分类</h4>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                <button type="button" class="btn btn-primary postCategoryForm">保存</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('after-scripts-end')
    {!! HTML::script(elixir('vendor/bootstrap-treeview/js/bootstrap-treeview.js')) !!}
    <script type="text/javascript">
        $(function() {
            var defaultData = {!! $list !!};
            $('#treeview').treeview({
                data: defaultData,
                showIcon: false
            });

            $('#categoryModal').on('show.bs.modal', function (e) {
                // do something...
                var compiled = _.template($("#popupCategory").html()), _h = compiled({
                    list: defaultData
                });
                $(".modal-body").empty().append(_h);
            });

            $(".postCategoryForm").on("click", function (e) {
                $.post("{{ route('admin.cms.categorys.store') }}", $("#postCategory").serialize(),
                        function(data){
                            if(data.status){
                                location.reload();
                            }
                        });
            });
        });
    </script>

    <script type="text/template" id="popupCategory">
        <form class="form-horizontal" id="postCategory">
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">名称</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="name" placeholder="名称">
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">上级分类</label>
                <div class="col-sm-10">
                    <select class="form-control listCategory" name="pid">
                            <option value="0">请选择上级</option>
                            <%_.each(list,function(l){%>
                            <option value="<%=l.id%>"><%=l.text%></option>
                        <%})%>
                    </select>
                </div>
            </div>
            <input type="hidden" name="status" value="1">
        </form>
    </script>
@endsection
