<?php

use Illuminate\Support\Facades\Route;

Route::get('policies', 'ConsulteeRecordResponseController@policies')
	->name('policies');

Route::get('policy', 'ConsulteeRecordResponseController@policy')
	->name('policy');

Route::get('index', 'ConsulteeRecordResponseController@index')
	->name('index');

Route::get('show', 'ConsulteeRecordResponseController@show')
	->name('show');

Route::post('create', 'ConsulteeRecordResponseController@create')
	->name('create');

Route::put('update', 'ConsulteeRecordResponseController@update')
	->name('update');

Route::delete('delete', 'ConsulteeRecordResponseController@delete')
	->name('delete');

Route::post('restore', 'ConsulteeRecordResponseController@restore')
	->name('restore');

Route::delete('force-delete', 'ConsulteeRecordResponseController@forceDelete')
	->name('force.delete');

Route::post('export', 'ConsulteeRecordResponseController@export')
	->name('export');