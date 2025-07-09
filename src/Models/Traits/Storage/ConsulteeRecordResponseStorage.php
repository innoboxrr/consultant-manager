<?php

namespace Innoboxrr\ConsultantManager\Models\Traits\Storage;

// use Innoboxrr\ConsultantManager\Models\ConsulteeRecordResponseMeta;

trait ConsulteeRecordResponseStorage
{

    public function createModel($request)
    {

        $consulteeRecordResponse = $this->create($request->only($this->creatable));

        return $consulteeRecordResponse;

    }

    public function updateModel($request)
    {
     
        $this->update($request->only($this->updatable));

        return $this;

    }

    /*
    public function updateModelMetas($request)
    {

        $this->update_metas($request, ConsulteeRecordResponseMeta::class, 'consultee_record_response_id')->updatePayload();

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