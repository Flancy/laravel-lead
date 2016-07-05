<?php

use App\Category;
use Bican\Roles\Models\Role;

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

Route::get('/add-roles', function() {
    Role::create([
        'name' => 'Admin',
        'slug' => 'admin',
        'description' => 'Главный администратор',
        'level' => 1,
    ]);

    Role::create([
        'name' => 'Company',
        'slug' => 'company',
        'description' => 'Компания',
        'level' => 3,
    ]);
    Role::create([
        'name' => 'Lead',
        'slug' => 'lead',
        'description' => 'Заказчик',
        'level' => 4,
    ]);
});

Route::group(['as' => 'companies', 'middleware' => 'role:company'], function()
{
    Route::get('settings', 'Company\SettingController@index');
    Route::post('settings/general', 'Company\SettingController@updateGeneral');

    Route::get('lead/{id}', 'Lead\HomeController@show');
});

Route::group(['as' => 'leads', 'middleware' => 'role:lead'], function()
{
    Route::resource('lead', 'Lead\HomeController');
});
