<?php

use Illuminate\Database\Seeder;

class LetterSizeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('lettersize')->insert([
           'name_letterSize'=>'XL',
            'description'=>null,
            'created_at'=>date('Y:m:d H:i:s'),
            'updated_at'=>null
        ]);
    }
}
