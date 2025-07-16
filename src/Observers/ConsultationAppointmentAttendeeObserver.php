<?php
 
namespace Innoboxrr\ConsultantManager\Observers;
 
use Innoboxrr\ConsultantManager\Models\ConsultationAppointmentAttendee;
 
class ConsultationAppointmentAttendeeObserver
{

    /**
     * Handle events after all transactions are committed.
     *
     * @var bool
     */
    // public $afterCommit = true;

    /**
     * Handle the ConsultationAppointmentAttendee "created" event.
     */
    public function created(ConsultationAppointmentAttendee $consultationAppointmentAttendee): void
    {
        $consultationAppointmentAttendee->log('created');
    }
 
    /**
     * Handle the ConsultationAppointmentAttendee "updated" event.
     */
    public function updated(ConsultationAppointmentAttendee $consultationAppointmentAttendee): void
    {
        $consultationAppointmentAttendee->log('updated');
    }
 
    /**
     * Handle the ConsultationAppointmentAttendee "deleted" event.
     */
    public function deleted(ConsultationAppointmentAttendee $consultationAppointmentAttendee): void
    {
        $consultationAppointmentAttendee->log('deleted');
    }
 
    /**
     * Handle the ConsultationAppointmentAttendee "restored" event.
     */
    public function restored(ConsultationAppointmentAttendee $consultationAppointmentAttendee): void
    {
        $consultationAppointmentAttendee->log('restored');
    }
 
    /**
     * Handle the ConsultationAppointmentAttendee "forceDeleted" event.
     */
    public function forceDeleted(ConsultationAppointmentAttendee $consultationAppointmentAttendee): void
    {
        $consultationAppointmentAttendee->log('forceDeleted');
    }
}