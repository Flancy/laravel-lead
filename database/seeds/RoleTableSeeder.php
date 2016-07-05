<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Bican\Roles\Models\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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
    }
}
