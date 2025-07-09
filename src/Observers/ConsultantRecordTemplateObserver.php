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
        // Remove if laravel-audit is used: $consultantRecordTemplate->log('created');
    }
 
    /**
     * Handle the ConsultantRecordTemplate "updated" event.
     */
    public function updated(ConsultantRecordTemplate $consultantRecordTemplate): void
    {
        // Remove if laravel-audit is used: $consultantRecordTemplate->log('updated');
    }
 
    /**
     * Handle the ConsultantRecordTemplate "deleted" event.
     */
    public function deleted(ConsultantRecordTemplate $consultantRecordTemplate): void
    {
        // Remove if laravel-audit is used: $consultantRecordTemplate->log('deleted');
    }
 
    /**
     * Handle the ConsultantRecordTemplate "restored" event.
     */
    public function restored(ConsultantRecordTemplate $consultantRecordTemplate): void
    {
        // Remove if laravel-audit is used: $consultantRecordTemplate->log('restored');
    }
 
    /**
     * Handle the ConsultantRecordTemplate "forceDeleted" event.
     */
    public function forceDeleted(ConsultantRecordTemplate $consultantRecordTemplate): void
    {
        // Remove if laravel-audit is used: $consultantRecordTemplate->log('forceDeleted');
    }
}