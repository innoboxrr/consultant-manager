<?php
 
namespace Innoboxrr\ConsultantManager\Observers;
 
use Innoboxrr\ConsultantManager\Models\ConsultationSessionService;
 
class ConsultationSessionServiceObserver
{

    /**
     * Handle events after all transactions are committed.
     *
     * @var bool
     */
    // public $afterCommit = true;

    /**
     * Handle the ConsultationSessionService "created" event.
     */
    public function created(ConsultationSessionService $consultationSessionService): void
    {
        $consultationSessionService->log('created');
    }
 
    /**
     * Handle the ConsultationSessionService "updated" event.
     */
    public function updated(ConsultationSessionService $consultationSessionService): void
    {
        $consultationSessionService->log('updated');
    }
 
    /**
     * Handle the ConsultationSessionService "deleted" event.
     */
    public function deleted(ConsultationSessionService $consultationSessionService): void
    {
        $consultationSessionService->log('deleted');
    }
 
    /**
     * Handle the ConsultationSessionService "restored" event.
     */
    public function restored(ConsultationSessionService $consultationSessionService): void
    {
        $consultationSessionService->log('restored');
    }
 
    /**
     * Handle the ConsultationSessionService "forceDeleted" event.
     */
    public function forceDeleted(ConsultationSessionService $consultationSessionService): void
    {
        $consultationSessionService->log('forceDeleted');
    }
}