<?php
 
namespace Innoboxrr\ConsultantManager\Observers;
 
use Innoboxrr\ConsultantManager\Models\ConsultationIntakeForm;
 
class ConsultationIntakeFormObserver
{

    /**
     * Handle events after all transactions are committed.
     *
     * @var bool
     */
    // public $afterCommit = true;

    /**
     * Handle the ConsultationIntakeForm "created" event.
     */
    public function created(ConsultationIntakeForm $consultationIntakeForm): void
    {
        $consultationIntakeForm->log('created');
    }
 
    /**
     * Handle the ConsultationIntakeForm "updated" event.
     */
    public function updated(ConsultationIntakeForm $consultationIntakeForm): void
    {
        $consultationIntakeForm->log('updated');
    }
 
    /**
     * Handle the ConsultationIntakeForm "deleted" event.
     */
    public function deleted(ConsultationIntakeForm $consultationIntakeForm): void
    {
        $consultationIntakeForm->log('deleted');
    }
 
    /**
     * Handle the ConsultationIntakeForm "restored" event.
     */
    public function restored(ConsultationIntakeForm $consultationIntakeForm): void
    {
        $consultationIntakeForm->log('restored');
    }
 
    /**
     * Handle the ConsultationIntakeForm "forceDeleted" event.
     */
    public function forceDeleted(ConsultationIntakeForm $consultationIntakeForm): void
    {
        $consultationIntakeForm->log('forceDeleted');
    }
}