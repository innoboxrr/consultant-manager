<?php
 
namespace Innoboxrr\ConsultantManager\Observers;
 
use Innoboxrr\ConsultantManager\Models\ConsultationAdvice;
 
class ConsultationAdviceObserver
{

    /**
     * Handle events after all transactions are committed.
     *
     * @var bool
     */
    // public $afterCommit = true;

    /**
     * Handle the ConsultationAdvice "created" event.
     */
    public function created(ConsultationAdvice $consultationAdvice): void
    {
        // Remove if laravel-audit is used: $consultationAdvice->log('created');
    }
 
    /**
     * Handle the ConsultationAdvice "updated" event.
     */
    public function updated(ConsultationAdvice $consultationAdvice): void
    {
        // Remove if laravel-audit is used: $consultationAdvice->log('updated');
    }
 
    /**
     * Handle the ConsultationAdvice "deleted" event.
     */
    public function deleted(ConsultationAdvice $consultationAdvice): void
    {
        // Remove if laravel-audit is used: $consultationAdvice->log('deleted');
    }
 
    /**
     * Handle the ConsultationAdvice "restored" event.
     */
    public function restored(ConsultationAdvice $consultationAdvice): void
    {
        // Remove if laravel-audit is used: $consultationAdvice->log('restored');
    }
 
    /**
     * Handle the ConsultationAdvice "forceDeleted" event.
     */
    public function forceDeleted(ConsultationAdvice $consultationAdvice): void
    {
        // Remove if laravel-audit is used: $consultationAdvice->log('forceDeleted');
    }
}