<?php

use Illuminate\Support\Facades\Route;

Route::get('policies', 'ConsultantAvailabilityController@policies')
	->name('policies');

Route::get('policy', 'ConsultantAvailabilityController@policy')
	->name('policy');

Route::get('index', 'ConsultantAvailabilityController@index')
	->name('index');

Route::get('show', 'ConsultantAvailabilityController@show')
	->name('show');

Route::post('create', 'ConsultantAvailabilityController@create')
	->name('create');

Route::put('update', 'ConsultantAvailabilityController@update')
	->name('update');

Route::delete('delete', 'ConsultantAvailabilityController@delete')
	->name('delete');

Route::post('restore', 'ConsultantAvailabilityController@restore')
	->name('restore');

Route::delete('force-delete', 'ConsultantAvailabilityController@forceDelete')
	->name('force.delete');

Route::post('export', 'ConsultantAvailabilityController@export')
	->name('export');