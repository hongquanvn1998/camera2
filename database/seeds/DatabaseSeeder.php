<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        	'name'=>'Thanhbinh198',
        	'email'=>'Nthanhbinh198@gmail.com',
        	'password'=>bcrypt('123456abc'),
        	'address'=>'Hà Nội',
        	'status'=>1,
        	'role'=>1,
        	'avatar'=>null,
        	'gioitinh'=>'nam',
        	'ngaysinh'=>'1998-11-27',

        ]);
	}
}
