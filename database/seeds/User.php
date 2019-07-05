<?php

use Illuminate\Database\Seeder;

class User extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
            'first_name' => 'Huy',
            'last_name' => 'Nguyễn',
            'phone' => '0395954444',
            'email' => 'huynguyenhuynv@gmail.com',
            'status' => '1',
            'gender' => '1',
            'password' => bcrypt('123456'),
            ],
            [
                'first_name' => 'admin',
                'last_name' => 'admin',
                'phone' => '0395954444',
                'email' => 'admin@bksoft.vn',
                'status' => '1',
                'gender' => '1',
                'password' => bcrypt('123456'),
            ],
        ]);
    }
}
