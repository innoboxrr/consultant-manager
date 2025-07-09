<?php

namespace Innoboxrr\ConsultantManager\Models\Traits\Storage;

// use Innoboxrr\ConsultantManager\Models\ConsultationAppointmentMeta;

trait ConsultationAppointmentStorage
{

    public function createModel($request)
    {

        $consultationAppointment = $this->create($request->only($this->creatable));

        return $consultationAppointment;

    }

    public function updateModel($request)
    {
     
        $this->update($request->only($this->updatable));

        return $this;

    }

    /*
    public function updateModelMetas($request)
    {

        $this->update_metas($request, ConsultationAppointmentMeta::class, 'consultation_appointment_id')->updatePayload();

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