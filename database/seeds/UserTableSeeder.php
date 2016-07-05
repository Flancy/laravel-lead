<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Lead;
use Bican\Roles\Models\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'email' => str_random(20).'@gmail.com',
            'password' => bcrypt('secret'),
        ]);

        $leadRole = Role::where('slug', 'lead')->first();

        $user->attachRole($leadRole);

        Lead::create([
            'user_id' => $user->id,
            'name' => str_random(10),
            'category' => 'photo',
            'lead_name' => str_random(10),
            'price' => '1000',
            'description' => str_random(100),
            'date_actual' => '2016-07-05',
        ]);
    }
}
