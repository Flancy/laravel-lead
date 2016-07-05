<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Bican\Roles\Models\Role;
use App\Category;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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
    }
}
