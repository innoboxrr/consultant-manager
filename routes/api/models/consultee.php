<?php

use Illuminate\Support\Facades\Route;

Route::get('policies', 'ConsulteeController@policies')
	->name('policies');

Route::get('policy', 'ConsulteeController@policy')
	->name('policy');

Route::get('index', 'ConsulteeController@index')
	->name('index');

Route::get('show', 'ConsulteeController@show')
	->name('show');

Route::post('create', 'ConsulteeController@create')
	->name('create');

Route::put('update', 'ConsulteeController@update')
	->name('update');

Route::delete('delete', 'ConsulteeController@delete')
	->name('delete');

Route::post('restore', 'ConsulteeController@restore')
	->name('restore');

Route::delete('force-delete', 'ConsulteeController@forceDelete')
	->name('force.delete');

Route::post('export', 'ConsulteeController@export')
	->name('export');