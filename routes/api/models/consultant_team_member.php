<?php

use Illuminate\Support\Facades\Route;

Route::get('policies', 'ConsultantTeamMemberController@policies')
	->name('policies');

Route::get('policy', 'ConsultantTeamMemberController@policy')
	->name('policy');

Route::get('index', 'ConsultantTeamMemberController@index')
	->name('index');

Route::get('show', 'ConsultantTeamMemberController@show')
	->name('show');

Route::post('create', 'ConsultantTeamMemberController@create')
	->name('create');

Route::put('update', 'ConsultantTeamMemberController@update')
	->name('update');

Route::delete('delete', 'ConsultantTeamMemberController@delete')
	->name('delete');

Route::post('restore', 'ConsultantTeamMemberController@restore')
	->name('restore');

Route::delete('force-delete', 'ConsultantTeamMemberController@forceDelete')
	->name('force.delete');

Route::post('export', 'ConsultantTeamMemberController@export')
	->name('export');