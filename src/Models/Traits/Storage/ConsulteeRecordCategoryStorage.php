<?php

namespace Innoboxrr\ConsultantManager\Models\Traits\Storage;

// use Innoboxrr\ConsultantManager\Models\ConsulteeRecordCategoryMeta;

trait ConsulteeRecordCategoryStorage
{

    public function createModel($request)
    {

        $consulteeRecordCategory = $this->create($request->only($this->creatable));

        return $consulteeRecordCategory;

    }

    public function updateModel($request)
    {
     
        $this->update($request->only($this->updatable));

        return $this;

    }

    /*
    public function updateModelMetas($request)
    {

        $this->update_metas($request, ConsulteeRecordCategoryMeta::class, 'consultee_record_category_id')->updatePayload();

        return $this;

    }
    */

    public function deleteModel()
    {

        $this->delete();

    }

    public function restoreModel()
    {

        $this->restore();

    }

    public function forceDeleteModel()
    {

        abort(403);

        $this->forceDelete();
        
    }

}