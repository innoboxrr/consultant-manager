<?php
 
namespace Innoboxrr\ConsultantManager\Observers;
 
use Innoboxrr\ConsultantManager\Models\ConsultationService;
 
class ConsultationServiceObserver
{

    /**
     * Handle events after all transactions are committed.
     *
     * @var bool
     */
    // public $afterCommit = true;

    /**
     * Handle the ConsultationService "created" event.
     */
    public function created(ConsultationService $consultationService): void
    {
        // Remove if laravel-audit is used: $consultationService->log('created');
    }
 
    /**
     * Handle the ConsultationService "updated" event.
     */
    public function updated(ConsultationService $consultationService): void
    {
        // Remove if laravel-audit is used: $consultationService->log('updated');
    }
 
    /**
     * Handle the ConsultationService "deleted" event.
     */
    public function deleted(ConsultationService $consultationService): void
    {
        // Remove if laravel-audit is used: $consultationService->log('deleted');
    }
 
    /**
     * Handle the ConsultationService "restored" event.
     */
    public function restored(ConsultationService $consultationService): void
    {
        // Remove if laravel-audit is used: $consultationService->log('restored');
    }
 
    /**
     * Handle the ConsultationService "forceDeleted" event.
     */
    public function forceDeleted(ConsultationService $consultationService): void
    {
        // Remove if laravel-audit is used: $consultationService->log('forceDeleted');
    }
}