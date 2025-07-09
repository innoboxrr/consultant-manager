<?php

use Illuminate\Support\Facades\Route;

Route::get('policies', 'ConsultationSessionServiceController@policies')
	->name('policies');

Route::get('policy', 'ConsultationSessionServiceController@policy')
	->name('policy');

Route::get('index', 'ConsultationSessionServiceController@index')
	->name('index');

Route::get('show', 'ConsultationSessionServiceController@show')
	->name('show');

Route::post('create', 'ConsultationSessionServiceController@create')
	->name('create');

Route::put('update', 'ConsultationSessionServiceController@update')
	->name('update');

Route::delete('delete', 'ConsultationSessionServiceController@delete')
	->name('delete');

Route::post('restore', 'ConsultationSessionServiceController@restore')
	->name('restore');

Route::delete('force-delete', 'ConsultationSessionServiceController@forceDelete')
	->name('force.delete');

Route::post('export', 'ConsultationSessionServiceController@export')
	->name('export');