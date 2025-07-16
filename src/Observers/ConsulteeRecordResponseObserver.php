<?php
 
namespace Innoboxrr\ConsultantManager\Observers;
 
use Innoboxrr\ConsultantManager\Models\ConsulteeRecordResponse;
 
class ConsulteeRecordResponseObserver
{

    /**
     * Handle events after all transactions are committed.
     *
     * @var bool
     */
    // public $afterCommit = true;

    /**
     * Handle the ConsulteeRecordResponse "created" event.
     */
    public function created(ConsulteeRecordResponse $consulteeRecordResponse): void
    {
        $consulteeRecordResponse->log('created');
    }
 
    /**
     * Handle the ConsulteeRecordResponse "updated" event.
     */
    public function updated(ConsulteeRecordResponse $consulteeRecordResponse): void
    {
        $consulteeRecordResponse->log('updated');
    }
 
    /**
     * Handle the ConsulteeRecordResponse "deleted" event.
     */
    public function deleted(ConsulteeRecordResponse $consulteeRecordResponse): void
    {
        $consulteeRecordResponse->log('deleted');
    }
 
    /**
     * Handle the ConsulteeRecordResponse "restored" event.
     */
    public function restored(ConsulteeRecordResponse $consulteeRecordResponse): void
    {
        $consulteeRecordResponse->log('restored');
    }
 
    /**
     * Handle the ConsulteeRecordResponse "forceDeleted" event.
     */
    public function forceDeleted(ConsulteeRecordResponse $consulteeRecordResponse): void
    {
        $consulteeRecordResponse->log('forceDeleted');
    }
}