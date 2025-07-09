<?php
 
namespace Innoboxrr\ConsultantManager\Observers;
 
use Innoboxrr\ConsultantManager\Models\ConsultationPayment;
 
class ConsultationPaymentObserver
{

    /**
     * Handle events after all transactions are committed.
     *
     * @var bool
     */
    // public $afterCommit = true;

    /**
     * Handle the ConsultationPayment "created" event.
     */
    public function created(ConsultationPayment $consultationPayment): void
    {
        // Remove if laravel-audit is used: $consultationPayment->log('created');
    }
 
    /**
     * Handle the ConsultationPayment "updated" event.
     */
    public function updated(ConsultationPayment $consultationPayment): void
    {
        // Remove if laravel-audit is used: $consultationPayment->log('updated');
    }
 
    /**
     * Handle the ConsultationPayment "deleted" event.
     */
    public function deleted(ConsultationPayment $consultationPayment): void
    {
        // Remove if laravel-audit is used: $consultationPayment->log('deleted');
    }
 
    /**
     * Handle the ConsultationPayment "restored" event.
     */
    public function restored(ConsultationPayment $consultationPayment): void
    {
        // Remove if laravel-audit is used: $consultationPayment->log('restored');
    }
 
    /**
     * Handle the ConsultationPayment "forceDeleted" event.
     */
    public function forceDeleted(ConsultationPayment $consultationPayment): void
    {
        // Remove if laravel-audit is used: $consultationPayment->log('forceDeleted');
    }
}