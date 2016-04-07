@extends ('backend.layouts.master')

@section ('title', trans('labels.backend.cms.article.management'))

@section('page-header')
    <h1>
        {{ trans('labels.backend.cms.article.management') }}
        <small>{{ trans('labels.backend.cms.article.list') }}</small>
    </h1>
@endsection

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.backend.cms.article.list') }}</h3>
            <div class="box-tools pull-right">
                <a href="{{ route('admin.cms.articles.create') }}" class="btn btn-primary btn-sm" role="button">{{ trans('labels.backend.cms.article.create') }}</a>
            </div>
        </div><!-- /.box-header -->

        <div class="box-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                    <tr>
                        <th width="5%">{{ trans('labels.backend.cms.article.table.id') }}</th>
                        <th>{{ trans('labels.backend.cms.article.table.title') }}</th>
                        <th width="8%">{{ trans('labels.backend.cms.article.table.view') }}</th>
                        <th width="5%">{{ trans('labels.backend.cms.article.table.status') }}</th>
                        <th width="8%" class="visible-lg">{{ trans('labels.backend.cms.article.table.created') }}</th>
                        <th width="8%" class="visible-lg">{{ trans('labels.backend.cms.article.table.last_updated') }}</th>
                        <th width="10%">{{ trans('labels.general.actions') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($articles as $article)
                        <tr>
                            <td>{!! $article->id !!}</td>
                            <td>{!! $article->title !!}</td>
                            <td>{!! $article->view_cnt !!}</td>
                            <td>{!! $article->status_label !!}</td>
                            <td class="visible-lg">{!! $article->created_at->diffForHumans() !!}</td>
                            <td class="visible-lg">{!! $article->updated_at->diffForHumans() !!}</td>
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
@stop
