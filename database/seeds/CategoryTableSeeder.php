<?php

class CategoryTableSeeder extends Seeder {

    public function run() {
        DB::table('categories')->delete();
        DB::statement("ALTER TABLE categories AUTO_INCREMENT=1");
        $dateTime = new DateTime('now');
        $dateTime = $dateTime->format('Y-m-d H:i:s');
        DB::table('categories')->insert(
            [
                [
                    'title' => 'PHP',
                    'slug' => Str::slug('Categorie-Php'),
                    'created_at' => $dateTime,
                    'updated_at' => $dateTime
                ],
                
                [
                    'title' => 'LARAVEL',
                    'slug' => Str::slug('Categorie-Laravel'),
                    'created_at' => $dateTime,
                    'updated_at' => $dateTime
                ]
                
            ]
        );
    }

}
