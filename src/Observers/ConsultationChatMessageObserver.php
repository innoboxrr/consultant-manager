<?php
 
namespace Innoboxrr\ConsultantManager\Observers;
 
use Innoboxrr\ConsultantManager\Models\ConsultationChatMessage;
 
class ConsultationChatMessageObserver
{

    /**
     * Handle events after all transactions are committed.
     *
     * @var bool
     */
    // public $afterCommit = true;

    /**
     * Handle the ConsultationChatMessage "created" event.
     */
    public function created(ConsultationChatMessage $consultationChatMessage): void
    {
        // Remove if laravel-audit is used: $consultationChatMessage->log('created');
    }
 
    /**
     * Handle the ConsultationChatMessage "updated" event.
     */
    public function updated(ConsultationChatMessage $consultationChatMessage): void
    {
        // Remove if laravel-audit is used: $consultationChatMessage->log('updated');
    }
 
    /**
     * Handle the ConsultationChatMessage "deleted" event.
     */
    public function deleted(ConsultationChatMessage $consultationChatMessage): void
    {
        // Remove if laravel-audit is used: $consultationChatMessage->log('deleted');
    }
 
    /**
     * Handle the ConsultationChatMessage "restored" event.
     */
    public function restored(ConsultationChatMessage $consultationChatMessage): void
    {
        // Remove if laravel-audit is used: $consultationChatMessage->log('restored');
    }
 
    /**
     * Handle the ConsultationChatMessage "forceDeleted" event.
     */
    public function forceDeleted(ConsultationChatMessage $consultationChatMessage): void
    {
        // Remove if laravel-audit is used: $consultationChatMessage->log('forceDeleted');
    }
}