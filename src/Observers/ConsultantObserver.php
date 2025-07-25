<?php
 
namespace Innoboxrr\ConsultantManager\Observers;
 
use Innoboxrr\ConsultantManager\Models\Consultant;
 
class ConsultantObserver
{

    /**
     * Handle events after all transactions are committed.
     *
     * @var bool
     */
    // public $afterCommit = true;

    /**
     * Handle the Consultant "created" event.
     */
    public function created(Consultant $consultant): void
    {
        $consultant->log('created');
    }
 
    /**
     * Handle the Consultant "updated" event.
     */
    public function updated(Consultant $consultant): void
    {
        $consultant->log('updated');
    }
 
    /**
     * Handle the Consultant "deleted" event.
     */
    public function deleted(Consultant $consultant): void
    {
        $consultant->log('deleted');
    }
 
    /**
     * Handle the Consultant "restored" event.
     */
    public function restored(Consultant $consultant): void
    {
        $consultant->log('restored');
    }
 
    /**
     * Handle the Consultant "forceDeleted" event.
     */
    public function forceDeleted(Consultant $consultant): void
    {
        $consultant->log('forceDeleted');
    }
}