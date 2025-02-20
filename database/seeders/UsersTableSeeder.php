<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Adil Ait Elhoucine',
                'email' => 'adil.ait.2003@gmail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$12$xoq0GndnxNTblk3m.OZGeuP2rGWPKxLx1h5qch7t.kDY58uwNxOsi',
                'remember_token' => NULL,
                'created_at' => '2025-02-20 13:49:45',
                'updated_at' => '2025-02-20 13:49:45',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'salah',
                'email' => 'salah@gmail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$12$wNyK1CT0roJHtc5m7E2iCekwast89ZKySIAa2s.M8YJ76FVQxR.cq',
                'remember_token' => NULL,
                'created_at' => '2025-02-20 22:17:20',
                'updated_at' => '2025-02-20 22:17:20',
            ),
        ));
        
        
    }
}