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
        $categories = [];

        $cName = 'Jeans';
        $categories[] = [
            'title' => $cName,
            'slug'=>str_slug($cName)
        ];
        $cName = 'Shirts';
        $categories[] = [
            'title' => $cName,
            'slug'=>str_slug($cName)
        ];
        $cName = 'Hats';
        $categories[] = [
            'title' => $cName,
            'slug'=>str_slug($cName)
        ];
        $cName = 'Hoodies';
        $categories[] = [
            'title' => $cName,
            'slug'=>str_slug($cName)
        ];
        $cName = 'Shoes';
        $categories[] = [
            'title' => $cName,
            'slug'=>str_slug($cName)
        ];
        $cName = 'Jewellery';
        $categories[] = [
            'title' => $cName,
            'slug'=>str_slug($cName)
        ];
        $cName = 'Suit';
        $categories[] = [
            'title' => $cName,
            'slug'=>str_slug($cName)
        ];

        \DB::table('categories')->insert($categories);
    }
}
