<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/',[
    'as' => 'home',
    'uses' => 'WelcomeController@index'
]);


/*
 * Registration
 */

Route::get('register', [
    'as' => 'register_path',
    'uses' => 'RegistrationController@create'
]);

Route::post('register', [
    'as' => 'register_path',
    'uses' => 'RegistrationController@store'
]);

/*
 * Sessions
 */
Route::get('login', [
    'as' => 'login_path',
    'uses' => 'SessionsController@create'
]);

Route::post('login',[
    'as' => 'login_path',
    'uses' => 'SessionsController@store'
]);

Route::get('logout', [
    'as' => 'logout_path',
    'uses' => 'SessionsController@destroy'
]);

/*
 * Password Confirmation
 */
Route::get('users/confirm/{code}',[
    'as' => 'confirm_path',
    'uses' =>'UsersController@confirm'
]);




Route::get('users/reset_password/{token}', [
    'as' => 'reset_path',
    'uses' => 'UsersController@resetPassword'
]);

Route::post('users/reset_password', [
    'as' => 'reset_path',
    'uses' => 'UsersController@doResetPassword'
]);

/*
 * Profile Path
 */

Route::get('users/dashboard', [
    'as' => 'profile_path',
    'uses' => 'UsersController@show'
]);

/*
 * Password Reminders
 */

Route::controller('password', 'RemindersController');


