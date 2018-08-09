<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\User;
use App\Survey;

Route::get('/', 'UsersController@getIndex');
Route::get('/users-data', 'UsersController@usersData')->name('users.data');
Route::get('/surveys',function (){
    return view('surveys.index');
});

Route::get('surveyusers', function(){
    dd(Survey::find(1)->assignedUsers);
});
Route::get('users', function(){
    $users = User::get(['id','name'])->toArray();
    return response()->json($users);
});
