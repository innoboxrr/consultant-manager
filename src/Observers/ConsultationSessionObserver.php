<?php
 
namespace Innoboxrr\ConsultantManager\Observers;
 
use Innoboxrr\ConsultantManager\Models\ConsultationSession;
 
class ConsultationSessionObserver
{

    /**
     * Handle events after all transactions are committed.
     *
     * @var bool
     */
    // public $afterCommit = true;

    /**
     * Handle the ConsultationSession "created" event.
     */
    public function created(ConsultationSession $consultationSession): void
    {
        $consultationSession->log('created');
    }
 
    /**
     * Handle the ConsultationSession "updated" event.
     */
    public function updated(ConsultationSession $consultationSession): void
    {
        $consultationSession->log('updated');
    }
 
    /**
     * Handle the ConsultationSession "deleted" event.
     */
    public function deleted(ConsultationSession $consultationSession): void
    {
        $consultationSession->log('deleted');
    }
 
    /**
     * Handle the ConsultationSession "restored" event.
     */
    public function restored(ConsultationSession $consultationSession): void
    {
        $consultationSession->log('restored');
    }
 
    /**
     * Handle the ConsultationSession "forceDeleted" event.
     */
    public function forceDeleted(ConsultationSession $consultationSession): void
    {
        $consultationSession->log('forceDeleted');
    }
}