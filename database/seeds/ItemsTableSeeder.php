<?php

use Illuminate\Database\Seeder;

class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [];

        $cName = 'H&M Jean';
        $items[] = [
            'category_id' => 1,
            'brand_id' => 1,
            'title' => $cName,
            'slug'=>str_slug($cName),
            'description' => 'SOME DESCRIPTION',
            'price' => 120,
            'image_url' => 'http://phoenix-shop.kz/media/cache/a2/20/a22067eb3c0185593102280e62a5985c.jpg'
        ];
        $cName = 'Black';
        $items[] = [
            'category_id' => 1,
            'brand_id' => 1,
            'title' => $cName,
            'slug'=>str_slug($cName),
            'description' => 'SOME DESCRIPTION',
            'price' => 100,
            'image_url' => 'http://phoenix-shop.kz/media/cache/b7/05/b7053fad575e2b7b02ba21364d7b5a63.jpg'
        ];
        $cName = 'FLAMESTRIKE TRACK';
        $items[] = [
            'category_id' => 1,
            'brand_id' => 1,
            'title' => $cName,
            'slug'=>str_slug($cName),
            'description' => 'SOME DESCRIPTION',
            'price' => 110,
            'image_url' => 'http://phoenix-shop.kz/media/cache/d5/8a/d58aca3ee4f53600297927cf8746264e.jpg'
        ];
        $cName = 'GREY CAMO SHARK';
        $items[] = [
            'category_id' => 1,
            'brand_id' => 2,
            'title' => $cName,
            'slug'=>str_slug($cName),
            'description' => 'SOME DESCRIPTION',
            'price' => 90,
            'image_url' => 'http://phoenix-shop.kz/media/cache/e5/37/e5372783a55173ec5e18e3cf7123bb4d.jpg'
        ];
        $cName = 'X PUBG';
        $items[] = [
            'category_id' => 1,
            'brand_id' => 1,
            'title' => $cName,
            'slug'=>str_slug($cName),
            'description' => 'SOME DESCRIPTION',
            'price' => 125,
            'image_url' => 'http://phoenix-shop.kz/media/cache/f9/6e/f96ed2fc5996e4991b8bd6b7a36c6d18.jpg'
        ];
        $cName = 'Supreme shirt';
        $items[] = [
            'category_id' => 2,
            'brand_id' => 2,
            'title' => $cName,
            'slug'=>str_slug($cName),
            'description' => 'SOME DESCRIPTION',
            'price' => 70,
            'image_url' => 'http://phoenix-shop.kz/media/cache/8d/e2/8de2a027c540f5cc95fea8bcc694de9b.jpg'
        ];
        $cName = 'ALLIANCE OF WARCRAFT';
        $items[] = [
            'category_id' => 2,
            'brand_id' => 2,
            'title' => $cName,
            'slug'=>str_slug($cName),
            'description' => 'SOME DESCRIPTION',
            'price' => 80,
            'image_url' => 'http://phoenix-shop.kz/media/cache/8c/93/8c935b0cc221d7753305ba0d4c4dbf0a.jpg'
        ];
        $cName = 'ASSC GREY PLAID';
        $items[] = [
            'category_id' => 2,
            'brand_id' => 3,
            'title' => $cName,
            'slug'=>str_slug($cName),
            'description' => 'SOME DESCRIPTION',
            'price' => 50,
            'image_url' => 'http://phoenix-shop.kz/media/cache/f1/3a/f13a0450f22a8d2212bbc95a5e1459ea.jpg'
        ];
        $cName = 'ASSC BLACK CLUB';
        $items[] = [
            'category_id' => 2,
            'brand_id' => 3,
            'title' => $cName,
            'slug'=>str_slug($cName),
            'description' => 'SOME DESCRIPTION',
            'price' => 40,
            'image_url' => 'http://phoenix-shop.kz/media/cache/8d/e2/8de2a027c540f5cc95fea8bcc694de9b.jpg'
        ];
        $cName = 'ASKYURSELF THUNDER';
        $items[] = [
            'category_id' => 2,
            'brand_id' => 2,
            'title' => $cName,
            'slug'=>str_slug($cName),
            'description' => 'SOME DESCRIPTION',
            'price' => 30,
            'image_url' => 'http://phoenix-shop.kz/media/cache/01/c1/01c11b6b28bcffe7f9429a7d8ede0e24.jpg'
        ];
        $cName = 'Adidas Hat';
        $items[] = [
            'category_id' => 3,
            'brand_id' => 1,
            'title' => $cName,
            'slug'=>str_slug($cName),
            'description' => 'SOME DESCRIPTION',
            'price' => 145,
            'image_url' => 'http://phoenix-shop.kz/media/cache/13/9b/139b38362ed62e473b90acf19eee7fe9.jpg'

        ];
        $cName = '5P SUPREME L.B. VIO FLOWERS';
        $items[] = [
            'category_id' => 3,
            'brand_id' => 2,
            'title' => $cName,
            'slug'=>str_slug($cName),
            'description' => 'SOME DESCRIPTION',
            'price' => 125,
            'image_url' => 'http://phoenix-shop.kz/media/cache/df/ef/dfefb39b67f1c757578921f6cf030c09.jpg'

        ];
        $cName = '5P SUPREME L.B. LEOPARD';
        $items[] = [
            'category_id' => 3,
            'brand_id' => 2,
            'title' => $cName,
            'slug'=>str_slug($cName),
            'description' => 'SOME DESCRIPTION',
            'price' => 144,
            'image_url' => 'http://phoenix-shop.kz/media/cache/5d/aa/5daa58b6dd9a43e963b88d7025867122.jpg'

        ];
        $cName = 'ASSC COWBOY DENIM WEIRD CAP';
        $items[] = [
            'category_id' => 3,
            'brand_id' => 3,
            'title' => $cName,
            'slug'=>str_slug($cName),
            'description' => 'SOME DESCRIPTION',
            'price' => 111,
            'image_url' => 'http://phoenix-shop.kz/media/cache/13/9b/139b38362ed62e473b90acf19eee7fe9.jpg'

        ];

        \DB::table('items')->insert($items);
    }
}
