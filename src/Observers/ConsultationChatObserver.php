<?php
 
namespace Innoboxrr\ConsultantManager\Observers;
 
use Innoboxrr\ConsultantManager\Models\ConsultationChat;
 
class ConsultationChatObserver
{

    /**
     * Handle events after all transactions are committed.
     *
     * @var bool
     */
    // public $afterCommit = true;

    /**
     * Handle the ConsultationChat "created" event.
     */
    public function created(ConsultationChat $consultationChat): void
    {
        $consultationChat->log('created');
    }
 
    /**
     * Handle the ConsultationChat "updated" event.
     */
    public function updated(ConsultationChat $consultationChat): void
    {
        $consultationChat->log('updated');
    }
 
    /**
     * Handle the ConsultationChat "deleted" event.
     */
    public function deleted(ConsultationChat $consultationChat): void
    {
        $consultationChat->log('deleted');
    }
 
    /**
     * Handle the ConsultationChat "restored" event.
     */
    public function restored(ConsultationChat $consultationChat): void
    {
        $consultationChat->log('restored');
    }
 
    /**
     * Handle the ConsultationChat "forceDeleted" event.
     */
    public function forceDeleted(ConsultationChat $consultationChat): void
    {
        $consultationChat->log('forceDeleted');
    }
}