<?php

namespace Innoboxrr\ConsultantManager\Exports;

use Innoboxrr\ConsultantManager\Models\ConsulteeRecordResponse;
use Innoboxrr\SearchSurge\Search\Builder;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ConsulteeRecordResponsesExports implements FromView
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
            ) . 'consultee_record_response', 
            [
                'consultee_record_responses' => $this->getQuery(),
                'exportCols' => ConsulteeRecordResponse::$export_cols
            ]
        );
    }

    public function getQuery()
    {   
        $builder = new Builder();
        return $builder->get(ConsulteeRecordResponse::class, $this->data);
    }

}