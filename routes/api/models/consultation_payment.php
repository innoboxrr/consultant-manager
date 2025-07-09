<?php

use Illuminate\Support\Facades\Route;

Route::get('policies', 'ConsultationPaymentController@policies')
	->name('policies');

Route::get('policy', 'ConsultationPaymentController@policy')
	->name('policy');

Route::get('index', 'ConsultationPaymentController@index')
	->name('index');

Route::get('show', 'ConsultationPaymentController@show')
	->name('show');

Route::post('create', 'ConsultationPaymentController@create')
	->name('create');

Route::put('update', 'ConsultationPaymentController@update')
	->name('update');

Route::delete('delete', 'ConsultationPaymentController@delete')
	->name('delete');

Route::post('restore', 'ConsultationPaymentController@restore')
	->name('restore');

Route::delete('force-delete', 'ConsultationPaymentController@forceDelete')
	->name('force.delete');

Route::post('export', 'ConsultationPaymentController@export')
	->name('export');