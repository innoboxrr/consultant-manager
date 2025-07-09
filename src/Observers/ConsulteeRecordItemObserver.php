<?php
 
namespace Innoboxrr\ConsultantManager\Observers;
 
use Innoboxrr\ConsultantManager\Models\ConsulteeRecordItem;
 
class ConsulteeRecordItemObserver
{

    /**
     * Handle events after all transactions are committed.
     *
     * @var bool
     */
    // public $afterCommit = true;

    /**
     * Handle the ConsulteeRecordItem "created" event.
     */
    public function created(ConsulteeRecordItem $consulteeRecordItem): void
    {
        // Remove if laravel-audit is used: $consulteeRecordItem->log('created');
    }
 
    /**
     * Handle the ConsulteeRecordItem "updated" event.
     */
    public function updated(ConsulteeRecordItem $consulteeRecordItem): void
    {
        // Remove if laravel-audit is used: $consulteeRecordItem->log('updated');
    }
 
    /**
     * Handle the ConsulteeRecordItem "deleted" event.
     */
    public function deleted(ConsulteeRecordItem $consulteeRecordItem): void
    {
        // Remove if laravel-audit is used: $consulteeRecordItem->log('deleted');
    }
 
    /**
     * Handle the ConsulteeRecordItem "restored" event.
     */
    public function restored(ConsulteeRecordItem $consulteeRecordItem): void
    {
        // Remove if laravel-audit is used: $consulteeRecordItem->log('restored');
    }
 
    /**
     * Handle the ConsulteeRecordItem "forceDeleted" event.
     */
    public function forceDeleted(ConsulteeRecordItem $consulteeRecordItem): void
    {
        // Remove if laravel-audit is used: $consulteeRecordItem->log('forceDeleted');
    }
}