<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(LaratrustSeeder::class);
        
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin'),
        ]);

        DB::table('users')->insert([
            'name' => 'Manager',
            'email' => 'manager@gmail.com',
            'password' => bcrypt('manager'),
        ]);

        DB::table('users')->insert([
            'name' => 'Finance',
            'email' => 'finance@gmail.com',
            'password' => bcrypt('finance'),
        ]);

        DB::table('users')->insert([
            'name' => 'Staff',
            'email' => 'staff@gmail.com',
            'password' => bcrypt('staff'),
        ]);
    }
}
