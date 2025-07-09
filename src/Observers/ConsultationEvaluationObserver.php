<?php
 
namespace Innoboxrr\ConsultantManager\Observers;
 
use Innoboxrr\ConsultantManager\Models\ConsultationEvaluation;
 
class ConsultationEvaluationObserver
{

    /**
     * Handle events after all transactions are committed.
     *
     * @var bool
     */
    // public $afterCommit = true;

    /**
     * Handle the ConsultationEvaluation "created" event.
     */
    public function created(ConsultationEvaluation $consultationEvaluation): void
    {
        // Remove if laravel-audit is used: $consultationEvaluation->log('created');
    }
 
    /**
     * Handle the ConsultationEvaluation "updated" event.
     */
    public function updated(ConsultationEvaluation $consultationEvaluation): void
    {
        // Remove if laravel-audit is used: $consultationEvaluation->log('updated');
    }
 
    /**
     * Handle the ConsultationEvaluation "deleted" event.
     */
    public function deleted(ConsultationEvaluation $consultationEvaluation): void
    {
        // Remove if laravel-audit is used: $consultationEvaluation->log('deleted');
    }
 
    /**
     * Handle the ConsultationEvaluation "restored" event.
     */
    public function restored(ConsultationEvaluation $consultationEvaluation): void
    {
        // Remove if laravel-audit is used: $consultationEvaluation->log('restored');
    }
 
    /**
     * Handle the ConsultationEvaluation "forceDeleted" event.
     */
    public function forceDeleted(ConsultationEvaluation $consultationEvaluation): void
    {
        // Remove if laravel-audit is used: $consultationEvaluation->log('forceDeleted');
    }
}