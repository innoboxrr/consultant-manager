<?php
 
namespace Innoboxrr\ConsultantManager\Observers;
 
use Innoboxrr\ConsultantManager\Models\ConsultationPrice;
 
class ConsultationPriceObserver
{

    /**
     * Handle events after all transactions are committed.
     *
     * @var bool
     */
    // public $afterCommit = true;

    /**
     * Handle the ConsultationPrice "created" event.
     */
    public function created(ConsultationPrice $consultationPrice): void
    {
        $consultationPrice->log('created');
    }
 
    /**
     * Handle the ConsultationPrice "updated" event.
     */
    public function updated(ConsultationPrice $consultationPrice): void
    {
        $consultationPrice->log('updated');
    }
 
    /**
     * Handle the ConsultationPrice "deleted" event.
     */
    public function deleted(ConsultationPrice $consultationPrice): void
    {
        $consultationPrice->log('deleted');
    }
 
    /**
     * Handle the ConsultationPrice "restored" event.
     */
    public function restored(ConsultationPrice $consultationPrice): void
    {
        $consultationPrice->log('restored');
    }
 
    /**
     * Handle the ConsultationPrice "forceDeleted" event.
     */
    public function forceDeleted(ConsultationPrice $consultationPrice): void
    {
        $consultationPrice->log('forceDeleted');
    }
}