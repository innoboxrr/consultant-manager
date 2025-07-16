<?php
 
namespace Innoboxrr\ConsultantManager\Observers;
 
use Innoboxrr\ConsultantManager\Models\ConsultantRecordTemplate;
 
class ConsultantRecordTemplateObserver
{

    /**
     * Handle events after all transactions are committed.
     *
     * @var bool
     */
    // public $afterCommit = true;

    /**
     * Handle the ConsultantRecordTemplate "created" event.
     */
    public function created(ConsultantRecordTemplate $consultantRecordTemplate): void
    {
        $consultantRecordTemplate->log('created');
    }
 
    /**
     * Handle the ConsultantRecordTemplate "updated" event.
     */
    public function updated(ConsultantRecordTemplate $consultantRecordTemplate): void
    {
        $consultantRecordTemplate->log('updated');
    }
 
    /**
     * Handle the ConsultantRecordTemplate "deleted" event.
     */
    public function deleted(ConsultantRecordTemplate $consultantRecordTemplate): void
    {
        $consultantRecordTemplate->log('deleted');
    }
 
    /**
     * Handle the ConsultantRecordTemplate "restored" event.
     */
    public function restored(ConsultantRecordTemplate $consultantRecordTemplate): void
    {
        $consultantRecordTemplate->log('restored');
    }
 
    /**
     * Handle the ConsultantRecordTemplate "forceDeleted" event.
     */
    public function forceDeleted(ConsultantRecordTemplate $consultantRecordTemplate): void
    {
        $consultantRecordTemplate->log('forceDeleted');
    }
}