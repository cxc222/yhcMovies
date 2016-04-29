<?php

namespace App\Models\Cms\Category\Traits\Attribute;

/**
 * Class UserAttribute
 * @package App\Models\Access\User\Traits\Attribute
 */
trait CategoryAttribute
{

    /**
     * @return string
     */
    public function getStatusLabelAttribute()
    {
        if ($this->isActive())
            return "<label class='label label-success'>".trans('labels.general.yes')."</label>";
        return "<label class='label label-danger'>".trans('labels.general.no')."</label>";
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
            return '<a href="' . route('admin.cms.articles.edit', $this->id) . '" class="btn btn-xs btn-primary"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="' . trans('buttons.general.crud.edit') . '"></i></a> ';
        }
        return '';
    }

    public function getDeleteButtonAttribute(){
        if (access()->allow('delete-articles')) {

            return '<a href="' . route('admin.cms.articles.destroy', $this->id) . '"
                 data-method="delete"
                 data-trans-button-cancel="'.trans('buttons.general.cancel').'"
                 data-trans-button-confirm="'.trans('buttons.general.crud.delete').'"
                 data-trans-title="'.trans('strings.backend.general.are_you_sure').'"
                 class="btn btn-xs btn-danger"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="' . trans('buttons.general.crud.delete') . '"></i></a>';

        }
        return '';
    }

    public function getActionButtonsAttribute(){
        return $this->getEditButtonAttribute() .
            $this->getDeleteButtonAttribute();
    }
}
