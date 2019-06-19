<?php

use Illuminate\Database\Seeder;

class ParentCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('parentcategories')->insert([
        	'name_parent_categories'=>'Hàng Gia Dụng',
        	'created_at'=>date('Y:m:d H:i:s'),
        	'updated_at'=>null
        ]);
    }
}
