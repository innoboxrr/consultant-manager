<?php
 
namespace Innoboxrr\ConsultantManager\Observers;
 
use Innoboxrr\ConsultantManager\Models\Consultee;
 
class ConsulteeObserver
{

    /**
     * Handle events after all transactions are committed.
     *
     * @var bool
     */
    // public $afterCommit = true;

    /**
     * Handle the Consultee "created" event.
     */
    public function created(Consultee $consultee): void
    {
        // Remove if laravel-audit is used: $consultee->log('created');
    }
 
    /**
     * Handle the Consultee "updated" event.
     */
    public function updated(Consultee $consultee): void
    {
        // Remove if laravel-audit is used: $consultee->log('updated');
    }
 
    /**
     * Handle the Consultee "deleted" event.
     */
    public function deleted(Consultee $consultee): void
    {
        // Remove if laravel-audit is used: $consultee->log('deleted');
    }
 
    /**
     * Handle the Consultee "restored" event.
     */
    public function restored(Consultee $consultee): void
    {
        // Remove if laravel-audit is used: $consultee->log('restored');
    }
 
    /**
     * Handle the Consultee "forceDeleted" event.
     */
    public function forceDeleted(Consultee $consultee): void
    {
        // Remove if laravel-audit is used: $consultee->log('forceDeleted');
    }
}