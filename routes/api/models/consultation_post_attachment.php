<?php

use Illuminate\Support\Facades\Route;

Route::get('policies', 'ConsultationPostAttachmentController@policies')
	->name('policies');

Route::get('policy', 'ConsultationPostAttachmentController@policy')
	->name('policy');

Route::get('index', 'ConsultationPostAttachmentController@index')
	->name('index');

Route::get('show', 'ConsultationPostAttachmentController@show')
	->name('show');

Route::post('create', 'ConsultationPostAttachmentController@create')
	->name('create');

Route::put('update', 'ConsultationPostAttachmentController@update')
	->name('update');

Route::delete('delete', 'ConsultationPostAttachmentController@delete')
	->name('delete');

Route::post('restore', 'ConsultationPostAttachmentController@restore')
	->name('restore');

Route::delete('force-delete', 'ConsultationPostAttachmentController@forceDelete')
	->name('force.delete');

Route::post('export', 'ConsultationPostAttachmentController@export')
	->name('export');