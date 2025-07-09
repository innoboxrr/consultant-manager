<?php

namespace Innoboxrr\ConsultantManager\Exports;

use Innoboxrr\ConsultantManager\Models\ConsultationPost;
use Innoboxrr\SearchSurge\Search\Builder;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ConsultationPostsExports implements FromView
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
            ) . 'consultation_post', 
            [
                'consultation_posts' => $this->getQuery(),
                'exportCols' => ConsultationPost::$export_cols
            ]
        );
    }

    public function getQuery()
    {   
        $builder = new Builder();
        return $builder->get(ConsultationPost::class, $this->data);
    }

}