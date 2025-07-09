<?php

use Illuminate\Support\Facades\Route;

Route::get('policies', 'ConsulteeRecordCategoryController@policies')
	->name('policies');

Route::get('policy', 'ConsulteeRecordCategoryController@policy')
	->name('policy');

Route::get('index', 'ConsulteeRecordCategoryController@index')
	->name('index');

Route::get('show', 'ConsulteeRecordCategoryController@show')
	->name('show');

Route::post('create', 'ConsulteeRecordCategoryController@create')
	->name('create');

Route::put('update', 'ConsulteeRecordCategoryController@update')
	->name('update');

Route::delete('delete', 'ConsulteeRecordCategoryController@delete')
	->name('delete');

Route::post('restore', 'ConsulteeRecordCategoryController@restore')
	->name('restore');

Route::delete('force-delete', 'ConsulteeRecordCategoryController@forceDelete')
	->name('force.delete');

Route::post('export', 'ConsulteeRecordCategoryController@export')
	->name('export');