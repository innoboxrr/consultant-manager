<?php

use Illuminate\Support\Facades\Route;

Route::get('policies', 'ConsultationChatController@policies')
	->name('policies');

Route::get('policy', 'ConsultationChatController@policy')
	->name('policy');

Route::get('index', 'ConsultationChatController@index')
	->name('index');

Route::get('show', 'ConsultationChatController@show')
	->name('show');

Route::post('create', 'ConsultationChatController@create')
	->name('create');

Route::put('update', 'ConsultationChatController@update')
	->name('update');

Route::delete('delete', 'ConsultationChatController@delete')
	->name('delete');

Route::post('restore', 'ConsultationChatController@restore')
	->name('restore');

Route::delete('force-delete', 'ConsultationChatController@forceDelete')
	->name('force.delete');

Route::post('export', 'ConsultationChatController@export')
	->name('export');