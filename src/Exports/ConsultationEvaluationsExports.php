<?php

namespace Innoboxrr\ConsultantManager\Exports;

use Innoboxrr\ConsultantManager\Models\ConsultationEvaluation;
use Innoboxrr\SearchSurge\Search\Builder;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ConsultationEvaluationsExports implements FromView
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
                'innoboxrrconsultantmanager.excel_view', 
                'innoboxrrconsultantmanager::excel.'
            ) . 'consultation_evaluation', 
            [
                'consultation_evaluations' => $this->getQuery(),
                'exportCols' => ConsultationEvaluation::$export_cols
            ]
        );
    }

    public function getQuery()
    {   
        $builder = new Builder();
        return $builder->get(ConsultationEvaluation::class, $this->data);
    }

}