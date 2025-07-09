<?php

namespace Innoboxrr\ConsultantManager\Models\Traits\Storage;

// use Innoboxrr\ConsultantManager\Models\ConsultationAppointmentAttendeeMeta;

trait ConsultationAppointmentAttendeeStorage
{

    public function createModel($request)
    {

        $consultationAppointmentAttendee = $this->create($request->only($this->creatable));

        return $consultationAppointmentAttendee;

    }

    public function updateModel($request)
    {
     
        $this->update($request->only($this->updatable));

        return $this;

    }

    /*
    public function updateModelMetas($request)
    {

        $this->update_metas($request, ConsultationAppointmentAttendeeMeta::class, 'consultation_appointment_attendee_id')->updatePayload();

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