<?php

namespace Innoboxrr\ConsultantManager\Exports;

use Innoboxrr\ConsultantManager\Models\ConsultantTeamMember;
use Innoboxrr\SearchSurge\Search\Builder;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ConsultantTeamMembersExports implements FromView
{

    protected $data;

    public function __construct( array $data) 
    {
        $this->data = $data;
    }

    public function view(): View
    {
        return view(
            config(
                'consultant-manager.excel_view', 
                'consultant-manager::excel.'
            ) . 'consultant_team_member', 
            [
                'consultant_team_members' => $this->getQuery(),
                'exportCols' => ConsultantTeamMember::$export_cols
            ]
        );
    }

    public function getQuery()
    {   
        $builder = new Builder();
        // lazy() en vez de get(): un export recorre la tabla entera y
        // hidratar todas las filas a la vez es lo que revienta la memoria.
        return $builder->lazy(ConsultantTeamMember::class, $this->data);
    }

}