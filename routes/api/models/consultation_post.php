<?php

use Illuminate\Support\Facades\Route;

Route::get('policies', 'ConsultationPostController@policies')
	->name('policies');

Route::get('policy', 'ConsultationPostController@policy')
	->name('policy');

Route::get('index', 'ConsultationPostController@index')
	->name('index');

Route::get('show', 'ConsultationPostController@show')
	->name('show');

Route::post('create', 'ConsultationPostController@create')
	->name('create');

Route::put('update', 'ConsultationPostController@update')
	->name('update');

Route::delete('delete', 'ConsultationPostController@delete')
	->name('delete');

Route::post('restore', 'ConsultationPostController@restore')
	->name('restore');

Route::delete('force-delete', 'ConsultationPostController@forceDelete')
	->name('force.delete');

Route::post('export', 'ConsultationPostController@export')
	->name('export');