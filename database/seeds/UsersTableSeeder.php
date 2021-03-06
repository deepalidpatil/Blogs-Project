<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([ 
            'name'       =>  'admin',
            'email'      =>  'admin@blog.com',
            'password'   =>   bcrypt('password'),
            'role'       =>   'admin',
            'created_at' =>  \Carbon\Carbon::now(),
            'updated_at' =>  \Carbon\Carbon::now()
        ]);
    }
}
