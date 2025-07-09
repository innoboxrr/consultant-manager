<?php

use Illuminate\Support\Facades\Route;

Route::get('policies', 'ConsultationPriceController@policies')
	->name('policies');

Route::get('policy', 'ConsultationPriceController@policy')
	->name('policy');

Route::get('index', 'ConsultationPriceController@index')
	->name('index');

Route::get('show', 'ConsultationPriceController@show')
	->name('show');

Route::post('create', 'ConsultationPriceController@create')
	->name('create');

Route::put('update', 'ConsultationPriceController@update')
	->name('update');

Route::delete('delete', 'ConsultationPriceController@delete')
	->name('delete');

Route::post('restore', 'ConsultationPriceController@restore')
	->name('restore');

Route::delete('force-delete', 'ConsultationPriceController@forceDelete')
	->name('force.delete');

Route::post('export', 'ConsultationPriceController@export')
	->name('export');