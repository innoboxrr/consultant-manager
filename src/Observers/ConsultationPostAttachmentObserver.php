<?php
 
namespace Innoboxrr\ConsultantManager\Observers;
 
use Innoboxrr\ConsultantManager\Models\ConsultationPostAttachment;
 
class ConsultationPostAttachmentObserver
{

    /**
     * Handle events after all transactions are committed.
     *
     * @var bool
     */
    // public $afterCommit = true;

    /**
     * Handle the ConsultationPostAttachment "created" event.
     */
    public function created(ConsultationPostAttachment $consultationPostAttachment): void
    {
        $consultationPostAttachment->log('created');
    }
 
    /**
     * Handle the ConsultationPostAttachment "updated" event.
     */
    public function updated(ConsultationPostAttachment $consultationPostAttachment): void
    {
        $consultationPostAttachment->log('updated');
    }
 
    /**
     * Handle the ConsultationPostAttachment "deleted" event.
     */
    public function deleted(ConsultationPostAttachment $consultationPostAttachment): void
    {
        $consultationPostAttachment->log('deleted');
    }
 
    /**
     * Handle the ConsultationPostAttachment "restored" event.
     */
    public function restored(ConsultationPostAttachment $consultationPostAttachment): void
    {
        $consultationPostAttachment->log('restored');
    }
 
    /**
     * Handle the ConsultationPostAttachment "forceDeleted" event.
     */
    public function forceDeleted(ConsultationPostAttachment $consultationPostAttachment): void
    {
        $consultationPostAttachment->log('forceDeleted');
    }
}