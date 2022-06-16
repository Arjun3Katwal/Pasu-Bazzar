<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=array(
            array(
                'name'=>'Admin',
                'email'=>'admin@gmail.com',
                'role'=> 1,
                'password'=>Hash::make('12345678'),
                
              

            ),
            array(
                'name'=>'User',
                'email'=>'user@gmail.com',
                'role'=>0,
                'password'=>Hash::make('12345678'),
                
               

            ),
            array(
                'name'=>'Vendor',
                'email'=>'vendor@gmail.com',
                'role'=>2,
                'password'=>Hash::make('12345678'),
                
               

            ),
        );

        DB::table('users')->insert($data);
    }
}
