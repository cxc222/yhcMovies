<?php

namespace App\Models\Cms\Collection\Traits\Attribute;

/**
 * Class UserAttribute
 * @package App\Models\Access\User\Traits\Attribute
 */
trait ArticleAttribute
{

    /**
     * @return string
     */
    public function getStatusLabelAttribute()
    {
        if ($this->isActive() == 1){
            return "<label class='label label-danger'>".trans('labels.backend.cms.collection.no')."</label>";
        }elseif($this->isActive() == 2){
            return "<label class='label label-success'>".trans('labels.backend.cms.collection.yes')."</label>";
        }

    }

    /**
     * @return bool
     */
    public function isActive() {
        return $this->status == 1;
    }

    /**
     * @return string
     */
    public function getEditButtonAttribute()
    {
        if (access()->allow('edit-articles')) {
            return '<a href="javascript:;" class="btn btn-xs btn-primary btn-onCheck" data-id=' . $this->id . '><i class="fa fa-check" data-toggle="tooltip" data-placement="top" title="' . trans('buttons.general.crud.check') . '"></i></a> ';
        }
        return '';
    }


    public function getActionButtonsAttribute(){
        return $this->getEditButtonAttribute();
    }
}
