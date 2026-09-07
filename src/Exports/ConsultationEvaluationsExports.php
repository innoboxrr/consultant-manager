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
                'consultant-manager.excel_view', 
                'consultant-manager::excel.'
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
        // lazy() en vez de get(): un export recorre la tabla entera y
        // hidratar todas las filas a la vez es lo que revienta la memoria.
        return $builder->lazy(ConsultationEvaluation::class, $this->data);
    }

}