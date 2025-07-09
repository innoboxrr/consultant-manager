<?php

use Illuminate\Support\Facades\Route;

Route::get('policies', 'ConsultantRecordTemplateController@policies')
	->name('policies');

Route::get('policy', 'ConsultantRecordTemplateController@policy')
	->name('policy');

Route::get('index', 'ConsultantRecordTemplateController@index')
	->name('index');

Route::get('show', 'ConsultantRecordTemplateController@show')
	->name('show');

Route::post('create', 'ConsultantRecordTemplateController@create')
	->name('create');

Route::put('update', 'ConsultantRecordTemplateController@update')
	->name('update');

Route::delete('delete', 'ConsultantRecordTemplateController@delete')
	->name('delete');

Route::post('restore', 'ConsultantRecordTemplateController@restore')
	->name('restore');

Route::delete('force-delete', 'ConsultantRecordTemplateController@forceDelete')
	->name('force.delete');

Route::post('export', 'ConsultantRecordTemplateController@export')
	->name('export');