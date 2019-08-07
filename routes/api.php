<?php

use Illuminate\Http\Request;
use App\User;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Project APIs
Route::apiResource('/projects',  'ProjectController')->middleware('basicAuth');
Route::post('projects/addMember/{project}',  'ProjectController@addMember')->middleware('basicAuth');
Route::get('projects/{project_id}/users',  'ProjectController@showMembers')->middleware('basicAuth');
// Route::group(['prefix' => 'projects'], function () {
//     Route::apiResource('/{project}/users',  'ProjectController@showMembers')->middleware('basicAuth');
// });


//Team APIs
Route::apiResource('/team',  'TeamController')->middleware('basicAuth');
Route::get('team/{team}/users',  'TeamController@showMembers')->middleware('basicAuth');
// Route::group(['prefix' => 'team'], function () {
//     Route::apiResource('/{team}/users',  'TeamController@showMembers')->middleware('basicAuth');
// });

//user profile APIs
Route::apiResource('/user',  'UserController')->middleware('basicAuth');

//new user register authentication

 //invite APIs
//  Route::group(['prefix' => 'user'], function () {
//     Route::apiResource('/{user}/sentInvites',  'SentInvitesController')->middleware('basicAuth');
// });
// Route::group(['prefix' => 'user'], function () {
//     Route::apiResource('/{user}/receivedInvites',  'ReceivedInvitesController')->middleware('basicAuth');
// });
Route::get('invite', 'InviteController@invite')->name('invite')->middleware('basicAuth');;
Route::post('invite', 'InviteController@process')->name('process')->middleware('basicAuth');;
// {token} is a required parameter that will be exposed to us in the controller method
Route::get('accept/{token}', 'InviteController@accept')->name('accept')->middleware('basicAuth');;





