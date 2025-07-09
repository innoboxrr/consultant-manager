<?php

use Illuminate\Support\Facades\Route;

Route::get('policies', 'ConsultationAppointmentAttendeeController@policies')
	->name('policies');

Route::get('policy', 'ConsultationAppointmentAttendeeController@policy')
	->name('policy');

Route::get('index', 'ConsultationAppointmentAttendeeController@index')
	->name('index');

Route::get('show', 'ConsultationAppointmentAttendeeController@show')
	->name('show');

Route::post('create', 'ConsultationAppointmentAttendeeController@create')
	->name('create');

Route::put('update', 'ConsultationAppointmentAttendeeController@update')
	->name('update');

Route::delete('delete', 'ConsultationAppointmentAttendeeController@delete')
	->name('delete');

Route::post('restore', 'ConsultationAppointmentAttendeeController@restore')
	->name('restore');

Route::delete('force-delete', 'ConsultationAppointmentAttendeeController@forceDelete')
	->name('force.delete');

Route::post('export', 'ConsultationAppointmentAttendeeController@export')
	->name('export');