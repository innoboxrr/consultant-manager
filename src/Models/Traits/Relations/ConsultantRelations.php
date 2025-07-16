<?php

namespace Innoboxrr\ConsultantManager\Models\Traits\Relations;

use Innoboxrr\ConsultantManager\Models\ConsultantAvailability;
use Innoboxrr\ConsultantManager\Models\ConsultantRecordTemplate;
use Innoboxrr\ConsultantManager\Models\ConsultantTeamMember;
use Innoboxrr\ConsultantManager\Models\ConsultationService;
use Innoboxrr\ConsultantManager\Models\Consultee;

// use \Znck\Eloquent\Traits\BelongsToThrough; // Docs: https://github.com/staudenmeir/belongs-to-through
// use \Staudenmeir\EloquentHasManyDeep\HasRelationships; // Docs: https://github.com/staudenmeir/eloquent-has-many-deep

trait ConsultantRelations
{
    public function user()
    {
        return $this->belongsTo(config('consultant-manager.user_class'));
    }

    public function consultees()
    {
        return $this->hasMany(Consultee::class);
    }

    public function teamMembers()
    {
        return $this->hasMany(ConsultantTeamMember::class);
    }

    public function recordTemplates()
    {
        return $this->hasMany(ConsultantRecordTemplate::class);
    }

    public function availabilities()
    {
        return $this->hasMany(ConsultantAvailability::class);
    }

    public function services()
    {
        return $this->hasMany(ConsultationService::class);
    }

}