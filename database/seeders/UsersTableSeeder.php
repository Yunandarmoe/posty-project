<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use \Illuminate\Support\Facades\DB;
use \Illuminate\Support\Facades\Hash;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //User::factory()->count(10)->create([
        //    DB::table('users')->insert([
        //        'name' => 'John',
        //        'email' => 'john@gmail.com',
        //        'password' => Hash::make('password')
        //    ])
        //]);
        User::factory()->count(10)->create();
    }
}
