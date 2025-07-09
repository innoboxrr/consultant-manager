<?php

use Illuminate\Support\Facades\Route;

Route::get('policies', 'ConsultationAppointmentController@policies')
	->name('policies');

Route::get('policy', 'ConsultationAppointmentController@policy')
	->name('policy');

Route::get('index', 'ConsultationAppointmentController@index')
	->name('index');

Route::get('show', 'ConsultationAppointmentController@show')
	->name('show');

Route::post('create', 'ConsultationAppointmentController@create')
	->name('create');

Route::put('update', 'ConsultationAppointmentController@update')
	->name('update');

Route::delete('delete', 'ConsultationAppointmentController@delete')
	->name('delete');

Route::post('restore', 'ConsultationAppointmentController@restore')
	->name('restore');

Route::delete('force-delete', 'ConsultationAppointmentController@forceDelete')
	->name('force.delete');

Route::post('export', 'ConsultationAppointmentController@export')
	->name('export');