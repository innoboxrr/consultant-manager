<?php
 
namespace Innoboxrr\ConsultantManager\Observers;
 
use Innoboxrr\ConsultantManager\Models\ConsultantTeamMember;
 
class ConsultantTeamMemberObserver
{

    /**
     * Handle events after all transactions are committed.
     *
     * @var bool
     */
    // public $afterCommit = true;

    /**
     * Handle the ConsultantTeamMember "created" event.
     */
    public function created(ConsultantTeamMember $consultantTeamMember): void
    {
        $consultantTeamMember->log('created');
    }
 
    /**
     * Handle the ConsultantTeamMember "updated" event.
     */
    public function updated(ConsultantTeamMember $consultantTeamMember): void
    {
        $consultantTeamMember->log('updated');
    }
 
    /**
     * Handle the ConsultantTeamMember "deleted" event.
     */
    public function deleted(ConsultantTeamMember $consultantTeamMember): void
    {
        $consultantTeamMember->log('deleted');
    }
 
    /**
     * Handle the ConsultantTeamMember "restored" event.
     */
    public function restored(ConsultantTeamMember $consultantTeamMember): void
    {
        $consultantTeamMember->log('restored');
    }
 
    /**
     * Handle the ConsultantTeamMember "forceDeleted" event.
     */
    public function forceDeleted(ConsultantTeamMember $consultantTeamMember): void
    {
        $consultantTeamMember->log('forceDeleted');
    }
}