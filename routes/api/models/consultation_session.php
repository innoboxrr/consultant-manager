<?php

use Illuminate\Support\Facades\Route;

Route::get('policies', 'ConsultationSessionController@policies')
	->name('policies');

Route::get('policy', 'ConsultationSessionController@policy')
	->name('policy');

Route::get('index', 'ConsultationSessionController@index')
	->name('index');

Route::get('show', 'ConsultationSessionController@show')
	->name('show');

Route::post('create', 'ConsultationSessionController@create')
	->name('create');

Route::put('update', 'ConsultationSessionController@update')
	->name('update');

Route::delete('delete', 'ConsultationSessionController@delete')
	->name('delete');

Route::post('restore', 'ConsultationSessionController@restore')
	->name('restore');

Route::delete('force-delete', 'ConsultationSessionController@forceDelete')
	->name('force.delete');

Route::post('export', 'ConsultationSessionController@export')
	->name('export');