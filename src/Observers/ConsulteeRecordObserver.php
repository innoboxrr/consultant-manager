<?php
 
namespace Innoboxrr\ConsultantManager\Observers;
 
use Innoboxrr\ConsultantManager\Models\ConsulteeRecord;
 
class ConsulteeRecordObserver
{

    /**
     * Handle events after all transactions are committed.
     *
     * @var bool
     */
    // public $afterCommit = true;

    /**
     * Handle the ConsulteeRecord "created" event.
     */
    public function created(ConsulteeRecord $consulteeRecord): void
    {
        // Remove if laravel-audit is used: $consulteeRecord->log('created');
    }
 
    /**
     * Handle the ConsulteeRecord "updated" event.
     */
    public function updated(ConsulteeRecord $consulteeRecord): void
    {
        // Remove if laravel-audit is used: $consulteeRecord->log('updated');
    }
 
    /**
     * Handle the ConsulteeRecord "deleted" event.
     */
    public function deleted(ConsulteeRecord $consulteeRecord): void
    {
        // Remove if laravel-audit is used: $consulteeRecord->log('deleted');
    }
 
    /**
     * Handle the ConsulteeRecord "restored" event.
     */
    public function restored(ConsulteeRecord $consulteeRecord): void
    {
        // Remove if laravel-audit is used: $consulteeRecord->log('restored');
    }
 
    /**
     * Handle the ConsulteeRecord "forceDeleted" event.
     */
    public function forceDeleted(ConsulteeRecord $consulteeRecord): void
    {
        // Remove if laravel-audit is used: $consulteeRecord->log('forceDeleted');
    }
}