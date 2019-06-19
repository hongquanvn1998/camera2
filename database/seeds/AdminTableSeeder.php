<?php

use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i < 10; $i++){
                DB::table('admin')->insert([
                    'username' => Str::random(10),
                    'password' => Str::random(6),
                    'email' => Str::random(10) . '@gmail.com',
                    'status' => 1,
                    'role' => -1,
                    'avatar' => null,
                    'created_at' => Date('Y:m:d H:i:s'),
                    'updated_at' => null
                ]);
        }
    }
}
