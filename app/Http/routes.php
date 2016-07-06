<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'HomeController@index');

Route::auth();
Route::get('lead-register', 'Auth\AuthLeadController@showRegistrationForm');
Route::post('lead-register', 'Auth\AuthLeadController@register');

Route::group(['as' => 'companies', 'middleware' => 'role:company'], function()
{
    Route::get('settings', 'Company\SettingController@index');
    Route::post('settings/general', 'Company\SettingController@updateGeneral');

    Route::get('debit', 'Company\DebitController@index');
    Route::post('debit', 'Company\DebitController@addMoney');

    Route::get('lead/{id}', 'Lead\HomeController@show');
    Route::post('lead/{id}/add-bid', 'Lead\HomeController@addBid');
    Route::post('lead/{id}/buy', 'HomeController@buyLead');
});

Route::get('lead/{id}', ['uses' => 'Lead\HomeController@show', 'middleware' => 'role:lead|company']);

Route::group(['as' => 'lead', 'middleware' => 'role:lead'], function()
{
    Route::resource('lead', 'Lead\HomeController');
});
