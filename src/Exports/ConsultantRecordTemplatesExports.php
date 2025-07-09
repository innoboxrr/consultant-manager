<?php

namespace Innoboxrr\ConsultantManager\Exports;

use Innoboxrr\ConsultantManager\Models\ConsultantRecordTemplate;
use Innoboxrr\SearchSurge\Search\Builder;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ConsultantRecordTemplatesExports implements FromView
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
            ) . 'consultant_record_template', 
            [
                'consultant_record_templates' => $this->getQuery(),
                'exportCols' => ConsultantRecordTemplate::$export_cols
            ]
        );
    }

    public function getQuery()
    {   
        $builder = new Builder();
        return $builder->get(ConsultantRecordTemplate::class, $this->data);
    }

}