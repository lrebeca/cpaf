<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Rebeca Loza',
            'email' => 'tratitulacion@gmail.com',
            'password' => bcrypt('Webinar2022*')
        ])->assignRole('Admin');

        User::factory(10)->create();
    }
}
