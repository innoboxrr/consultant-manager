<?php

namespace Innoboxrr\ConsultantManager\Exports;

use Innoboxrr\ConsultantManager\Models\ConsultationAppointmentAttendee;
use Innoboxrr\SearchSurge\Search\Builder;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ConsultationAppointmentAttendeesExports implements FromView
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
            ) . 'consultation_appointment_attendee', 
            [
                'consultation_appointment_attendees' => $this->getQuery(),
                'exportCols' => ConsultationAppointmentAttendee::$export_cols
            ]
        );
    }

    public function getQuery()
    {   
        $builder = new Builder();
        return $builder->get(ConsultationAppointmentAttendee::class, $this->data);
    }

}