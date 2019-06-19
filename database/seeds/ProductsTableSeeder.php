<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$color = json_encode([2]);
    	$sizeN = json_encode([1,2,3,4,5,6,7,8,9]);
    	$img = json_encode(['quanjeanbac.png','quanjeanbac2.png','quanjeanbac3.png']);
        DB::table('products')->insert([
        	'name'=>'Quần Jean Bạc',
        	'brand_id'=>1,
        	'color_id'=>$color,
        	'sizeNumber_id'=>$sizeN,
        	'sizeLetter_id'=>null,
        	'categories_id'=>5,
        	'price'=>250,
        	'quantity'=>10,
        	'sale_off'=>5,
        	'description'=>null,
        	'url_image'=>$img,
        	'highlight'=>1,
        	'created_at'=>date('Y:m:d H:i:s'),
        	'updated_at'=>null

        ]);
    }
}
