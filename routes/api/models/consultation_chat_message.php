<?php

use Illuminate\Support\Facades\Route;

Route::get('policies', 'ConsultationChatMessageController@policies')
	->name('policies');

Route::get('policy', 'ConsultationChatMessageController@policy')
	->name('policy');

Route::get('index', 'ConsultationChatMessageController@index')
	->name('index');

Route::get('show', 'ConsultationChatMessageController@show')
	->name('show');

Route::post('create', 'ConsultationChatMessageController@create')
	->name('create');

Route::put('update', 'ConsultationChatMessageController@update')
	->name('update');

Route::delete('delete', 'ConsultationChatMessageController@delete')
	->name('delete');

Route::post('restore', 'ConsultationChatMessageController@restore')
	->name('restore');

Route::delete('force-delete', 'ConsultationChatMessageController@forceDelete')
	->name('force.delete');

Route::post('export', 'ConsultationChatMessageController@export')
	->name('export');