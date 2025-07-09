<?php
 
namespace Innoboxrr\ConsultantManager\Observers;
 
use Innoboxrr\ConsultantManager\Models\ConsultationAppointment;
 
class ConsultationAppointmentObserver
{

    /**
     * Handle events after all transactions are committed.
     *
     * @var bool
     */
    // public $afterCommit = true;

    /**
     * Handle the ConsultationAppointment "created" event.
     */
    public function created(ConsultationAppointment $consultationAppointment): void
    {
        // Remove if laravel-audit is used: $consultationAppointment->log('created');
    }
 
    /**
     * Handle the ConsultationAppointment "updated" event.
     */
    public function updated(ConsultationAppointment $consultationAppointment): void
    {
        // Remove if laravel-audit is used: $consultationAppointment->log('updated');
    }
 
    /**
     * Handle the ConsultationAppointment "deleted" event.
     */
    public function deleted(ConsultationAppointment $consultationAppointment): void
    {
        // Remove if laravel-audit is used: $consultationAppointment->log('deleted');
    }
 
    /**
     * Handle the ConsultationAppointment "restored" event.
     */
    public function restored(ConsultationAppointment $consultationAppointment): void
    {
        // Remove if laravel-audit is used: $consultationAppointment->log('restored');
    }
 
    /**
     * Handle the ConsultationAppointment "forceDeleted" event.
     */
    public function forceDeleted(ConsultationAppointment $consultationAppointment): void
    {
        // Remove if laravel-audit is used: $consultationAppointment->log('forceDeleted');
    }
}