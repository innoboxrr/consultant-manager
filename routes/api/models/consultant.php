<?php

use Illuminate\Support\Facades\Route;

Route::get('policies', 'ConsultantController@policies')
	->name('policies');

Route::get('policy', 'ConsultantController@policy')
	->name('policy');

Route::get('index', 'ConsultantController@index')
	->name('index');

Route::get('show', 'ConsultantController@show')
	->name('show');

Route::post('create', 'ConsultantController@create')
	->name('create');

Route::put('update', 'ConsultantController@update')
	->name('update');

Route::delete('delete', 'ConsultantController@delete')
	->name('delete');

Route::post('restore', 'ConsultantController@restore')
	->name('restore');

Route::delete('force-delete', 'ConsultantController@forceDelete')
	->name('force.delete');

Route::post('export', 'ConsultantController@export')
	->name('export');