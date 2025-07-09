<?php

use Illuminate\Support\Facades\Route;

Route::get('policies', 'ConsultationEvaluationController@policies')
	->name('policies');

Route::get('policy', 'ConsultationEvaluationController@policy')
	->name('policy');

Route::get('index', 'ConsultationEvaluationController@index')
	->name('index');

Route::get('show', 'ConsultationEvaluationController@show')
	->name('show');

Route::post('create', 'ConsultationEvaluationController@create')
	->name('create');

Route::put('update', 'ConsultationEvaluationController@update')
	->name('update');

Route::delete('delete', 'ConsultationEvaluationController@delete')
	->name('delete');

Route::post('restore', 'ConsultationEvaluationController@restore')
	->name('restore');

Route::delete('force-delete', 'ConsultationEvaluationController@forceDelete')
	->name('force.delete');

Route::post('export', 'ConsultationEvaluationController@export')
	->name('export');