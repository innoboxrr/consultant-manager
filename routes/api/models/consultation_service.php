<?php

use Illuminate\Support\Facades\Route;

Route::get('policies', 'ConsultationServiceController@policies')
	->name('policies');

Route::get('policy', 'ConsultationServiceController@policy')
	->name('policy');

Route::get('index', 'ConsultationServiceController@index')
	->name('index');

Route::get('show', 'ConsultationServiceController@show')
	->name('show');

Route::post('create', 'ConsultationServiceController@create')
	->name('create');

Route::put('update', 'ConsultationServiceController@update')
	->name('update');

Route::delete('delete', 'ConsultationServiceController@delete')
	->name('delete');

Route::post('restore', 'ConsultationServiceController@restore')
	->name('restore');

Route::delete('force-delete', 'ConsultationServiceController@forceDelete')
	->name('force.delete');

Route::post('export', 'ConsultationServiceController@export')
	->name('export');