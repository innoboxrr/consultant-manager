<?php
 
namespace Innoboxrr\ConsultantManager\Observers;
 
use Innoboxrr\ConsultantManager\Models\ConsulteeRecordCategory;
 
class ConsulteeRecordCategoryObserver
{

    /**
     * Handle events after all transactions are committed.
     *
     * @var bool
     */
    // public $afterCommit = true;

    /**
     * Handle the ConsulteeRecordCategory "created" event.
     */
    public function created(ConsulteeRecordCategory $consulteeRecordCategory): void
    {
        $consulteeRecordCategory->log('created');
    }
 
    /**
     * Handle the ConsulteeRecordCategory "updated" event.
     */
    public function updated(ConsulteeRecordCategory $consulteeRecordCategory): void
    {
        $consulteeRecordCategory->log('updated');
    }
 
    /**
     * Handle the ConsulteeRecordCategory "deleted" event.
     */
    public function deleted(ConsulteeRecordCategory $consulteeRecordCategory): void
    {
        $consulteeRecordCategory->log('deleted');
    }
 
    /**
     * Handle the ConsulteeRecordCategory "restored" event.
     */
    public function restored(ConsulteeRecordCategory $consulteeRecordCategory): void
    {
        $consulteeRecordCategory->log('restored');
    }
 
    /**
     * Handle the ConsulteeRecordCategory "forceDeleted" event.
     */
    public function forceDeleted(ConsulteeRecordCategory $consulteeRecordCategory): void
    {
        $consulteeRecordCategory->log('forceDeleted');
    }
}