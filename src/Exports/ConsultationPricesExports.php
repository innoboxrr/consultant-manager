<?php

namespace Innoboxrr\ConsultantManager\Exports;

use Innoboxrr\ConsultantManager\Models\ConsultationPrice;
use Innoboxrr\SearchSurge\Search\Builder;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ConsultationPricesExports implements FromView
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
            ) . 'consultation_price', 
            [
                'consultation_prices' => $this->getQuery(),
                'exportCols' => ConsultationPrice::$export_cols
            ]
        );
    }

    public function getQuery()
    {   
        $builder = new Builder();
        return $builder->get(ConsultationPrice::class, $this->data);
    }

}