<?php

namespace Innoboxrr\ConsultantManager\Models\Traits\Storage;

// use Innoboxrr\ConsultantManager\Models\ConsultantRecordTemplateMeta;

trait ConsultantRecordTemplateStorage
{

    public function createModel($request)
    {

        $consultantRecordTemplate = $this->create($request->only($this->creatable));

        return $consultantRecordTemplate;

    }

    public function updateModel($request)
    {
     
        $this->update($request->only($this->updatable));

        return $this;

    }

    /*
    public function updateModelMetas($request)
    {

        $this->update_metas($request, ConsultantRecordTemplateMeta::class, 'consultant_record_template_id')->updatePayload();

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