<?php

use Illuminate\Database\Seeder;

class BrandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $brands = [];

        $cName = 'Adidas';
        $brands[] = [
            'title' => $cName,
            'slug'=>str_slug($cName)
        ];
        $cName = 'Supreme';
        $brands[] = [
            'title' => $cName,
            'slug'=>str_slug($cName)
        ];
        $cName = 'ASSC';
        $brands[] = [
            'title' => $cName,
            'slug'=>str_slug($cName)
        ];
        \DB::table('brands')->insert($brands);
    }
}
