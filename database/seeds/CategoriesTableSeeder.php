<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
        	'name_categories'=>'Sữa Rửa Mặt',
        	'id_parent'=>5,
        	'created_at'=>date('Y:m:d H:i:s'),
        	'updated_at'=>null
        ]);
    }
}
