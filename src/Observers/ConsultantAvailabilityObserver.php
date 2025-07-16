<?php
 
namespace Innoboxrr\ConsultantManager\Observers;
 
use Innoboxrr\ConsultantManager\Models\ConsultantAvailability;
 
class ConsultantAvailabilityObserver
{

    /**
     * Handle events after all transactions are committed.
     *
     * @var bool
     */
    // public $afterCommit = true;

    /**
     * Handle the ConsultantAvailability "created" event.
     */
    public function created(ConsultantAvailability $consultantAvailability): void
    {
        $consultantAvailability->log('created');
    }
 
    /**
     * Handle the ConsultantAvailability "updated" event.
     */
    public function updated(ConsultantAvailability $consultantAvailability): void
    {
        $consultantAvailability->log('updated');
    }
 
    /**
     * Handle the ConsultantAvailability "deleted" event.
     */
    public function deleted(ConsultantAvailability $consultantAvailability): void
    {
        $consultantAvailability->log('deleted');
    }
 
    /**
     * Handle the ConsultantAvailability "restored" event.
     */
    public function restored(ConsultantAvailability $consultantAvailability): void
    {
        $consultantAvailability->log('restored');
    }
 
    /**
     * Handle the ConsultantAvailability "forceDeleted" event.
     */
    public function forceDeleted(ConsultantAvailability $consultantAvailability): void
    {
        $consultantAvailability->log('forceDeleted');
    }
}