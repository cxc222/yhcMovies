<?php
Breadcrumbs::register('admin.cms.article.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    //$breadcrumbs->push(trans('labels.backend.access.users.management'), route('admin.access.users.index'));
});