@extends ('backend.cms.collection.base')

@section ('title', trans('labels.backend.cms.collection.management'))

@section('page-header')
    <h1>
        {{ trans('labels.backend.cms.collection.management') }}
        <small>{{ trans('labels.backend.cms.collection.list') }}</small>
    </h1>
@endsection

@section('after-styles-end')
    {!! Html::style(elixir('vendor/bootstrap-treeview/css/bootstrap-treeview.css')) !!}
@endsection

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.backend.cms.collection.list') }}</h3>
        </div><!-- /.box-header -->

        <div class="box-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                    <tr>
                        <th width="5%">{{ trans('labels.backend.cms.collection.table.id') }}</th>
                        <th>{{ trans('labels.backend.cms.collection.table.title') }}</th>
                        <th width="8%">{{ trans('labels.backend.cms.collection.table.status') }}</th>
                        <th width="10%">{{ trans('labels.general.actions') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($articles as $article)
                        <tr>
                            <td>{!! $article->id !!}</td>
                            <td>{!! $article->title !!}</td>
                            <td>{!! $article->status_label !!}</td>
                            <td>{!! $article->action_buttons !!}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            <div class="pull-left">
                {!! $articles->total() !!} {{ trans_choice('labels.backend.cms.article.table.total', $articles->total()) }}
            </div>

            <div class="pull-right">
                {!! $articles->render() !!}
            </div>

            <div class="clearfix"></div>
        </div><!-- /.box-body -->
    </div><!--box-->
@endsection

@section('after-scripts-end')
    <script type="text/javascript">
        $(function() {
            $(".btn-onCheck").on("click", function(){
                var $this = $(this), id = $this.attr('data-id');
                $.post("{{ url('admin/coll/check') }}", {
                    id: id
                }, function(res){
                    if(res.status){
                        console.log(22);
                    }
                });
                console.log(id);
            });
        });
    </script>
@endsection
