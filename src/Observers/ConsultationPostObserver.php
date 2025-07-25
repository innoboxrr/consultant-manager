<?php
 
namespace Innoboxrr\ConsultantManager\Observers;
 
use Innoboxrr\ConsultantManager\Models\ConsultationPost;
 
class ConsultationPostObserver
{

    /**
     * Handle events after all transactions are committed.
     *
     * @var bool
     */
    // public $afterCommit = true;

    /**
     * Handle the ConsultationPost "created" event.
     */
    public function created(ConsultationPost $consultationPost): void
    {
        $consultationPost->log('created');
    }
 
    /**
     * Handle the ConsultationPost "updated" event.
     */
    public function updated(ConsultationPost $consultationPost): void
    {
        $consultationPost->log('updated');
    }
 
    /**
     * Handle the ConsultationPost "deleted" event.
     */
    public function deleted(ConsultationPost $consultationPost): void
    {
        $consultationPost->log('deleted');
    }
 
    /**
     * Handle the ConsultationPost "restored" event.
     */
    public function restored(ConsultationPost $consultationPost): void
    {
        $consultationPost->log('restored');
    }
 
    /**
     * Handle the ConsultationPost "forceDeleted" event.
     */
    public function forceDeleted(ConsultationPost $consultationPost): void
    {
        $consultationPost->log('forceDeleted');
    }
}