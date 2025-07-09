<?php

use Illuminate\Support\Facades\Route;

Route::get('policies', 'ConsultationAdviceController@policies')
	->name('policies');

Route::get('policy', 'ConsultationAdviceController@policy')
	->name('policy');

Route::get('index', 'ConsultationAdviceController@index')
	->name('index');

Route::get('show', 'ConsultationAdviceController@show')
	->name('show');

Route::post('create', 'ConsultationAdviceController@create')
	->name('create');

Route::put('update', 'ConsultationAdviceController@update')
	->name('update');

Route::delete('delete', 'ConsultationAdviceController@delete')
	->name('delete');

Route::post('restore', 'ConsultationAdviceController@restore')
	->name('restore');

Route::delete('force-delete', 'ConsultationAdviceController@forceDelete')
	->name('force.delete');

Route::post('export', 'ConsultationAdviceController@export')
	->name('export');