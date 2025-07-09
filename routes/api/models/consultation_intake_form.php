<?php

use Illuminate\Support\Facades\Route;

Route::get('policies', 'ConsultationIntakeFormController@policies')
	->name('policies');

Route::get('policy', 'ConsultationIntakeFormController@policy')
	->name('policy');

Route::get('index', 'ConsultationIntakeFormController@index')
	->name('index');

Route::get('show', 'ConsultationIntakeFormController@show')
	->name('show');

Route::post('create', 'ConsultationIntakeFormController@create')
	->name('create');

Route::put('update', 'ConsultationIntakeFormController@update')
	->name('update');

Route::delete('delete', 'ConsultationIntakeFormController@delete')
	->name('delete');

Route::post('restore', 'ConsultationIntakeFormController@restore')
	->name('restore');

Route::delete('force-delete', 'ConsultationIntakeFormController@forceDelete')
	->name('force.delete');

Route::post('export', 'ConsultationIntakeFormController@export')
	->name('export');