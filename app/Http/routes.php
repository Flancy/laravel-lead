<?php

use App\Category;

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

Route::get('/add-slug', function() {
    Category::create([
        'slug' => 'photo',
        'icon' => 'fa fa-camera',
        'name' => 'Фотографии',
        'description' => 'Категория фотографии'
    ]);

    Category::create([
        'slug' => 'build',
        'icon' => 'fa fa-building',
        'name' => 'Строительство',
        'description' => 'Категория строительство'
    ]);

    Category::create([
        'slug' => 'website development',
        'icon' => 'fa fa-laptop',
        'name' => 'Создание сайтов',
        'description' => 'Категория создания сайтов'
    ]);
});

Route::group(['namespace' => 'Company', 'as' => 'companies'], function()
{
    Route::get('settings', 'SettingController@index');
    Route::post('settings/general', 'SettingController@updateGeneral');
});

Route::group(['as' => 'leads'], function()
{
    Route::get('lead-register', 'Auth\AuthLeadController@showRegistrationForm');
    Route::post('lead-register', 'Auth\AuthLeadController@register');

    Route::resource('lead', 'Lead\HomeController');
});
