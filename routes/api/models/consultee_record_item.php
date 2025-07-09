<?php

use Illuminate\Support\Facades\Route;

Route::get('policies', 'ConsulteeRecordItemController@policies')
	->name('policies');

Route::get('policy', 'ConsulteeRecordItemController@policy')
	->name('policy');

Route::get('index', 'ConsulteeRecordItemController@index')
	->name('index');

Route::get('show', 'ConsulteeRecordItemController@show')
	->name('show');

Route::post('create', 'ConsulteeRecordItemController@create')
	->name('create');

Route::put('update', 'ConsulteeRecordItemController@update')
	->name('update');

Route::delete('delete', 'ConsulteeRecordItemController@delete')
	->name('delete');

Route::post('restore', 'ConsulteeRecordItemController@restore')
	->name('restore');

Route::delete('force-delete', 'ConsulteeRecordItemController@forceDelete')
	->name('force.delete');

Route::post('export', 'ConsulteeRecordItemController@export')
	->name('export');