<?php

namespace Innoboxrr\ConsultantManager\Models\Traits\Storage;

// use Innoboxrr\ConsultantManager\Models\ConsultationPriceMeta;

trait ConsultationPriceStorage
{

    public function createModel($request)
    {

        $consultationPrice = $this->create($request->only($this->creatable));

        return $consultationPrice;

    }

    public function updateModel($request)
    {
     
        $this->update($request->only($this->updatable));

        return $this;

    }

    /*
    public function updateModelMetas($request)
    {

        $this->update_metas($request, ConsultationPriceMeta::class, 'consultation_price_id')->updatePayload();

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