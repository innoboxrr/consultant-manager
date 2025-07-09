<?php

use Illuminate\Support\Facades\Route;

Route::get('policies', 'ConsulteeRecordController@policies')
	->name('policies');

Route::get('policy', 'ConsulteeRecordController@policy')
	->name('policy');

Route::get('index', 'ConsulteeRecordController@index')
	->name('index');

Route::get('show', 'ConsulteeRecordController@show')
	->name('show');

Route::post('create', 'ConsulteeRecordController@create')
	->name('create');

Route::put('update', 'ConsulteeRecordController@update')
	->name('update');

Route::delete('delete', 'ConsulteeRecordController@delete')
	->name('delete');

Route::post('restore', 'ConsulteeRecordController@restore')
	->name('restore');

Route::delete('force-delete', 'ConsulteeRecordController@forceDelete')
	->name('force.delete');

Route::post('export', 'ConsulteeRecordController@export')
	->name('export');