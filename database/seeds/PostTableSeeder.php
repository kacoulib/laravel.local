<?php

class PostTableSeeder extends Seeder {

    public function run() {
        DB::table('posts')->delete();
        DB::statement("ALTER TABLE posts AUTO_INCREMENT=1");
        $dateTime = new DateTime('now');
        $dateTime = $dateTime->format('Y-m-d H:i:s');
        DB::table('posts')->insert(
            [
                [
                    'title' => 'PSR-0 Autoload hhhh',
                    'slug' => Str::slug('PSR-0 Autoload'),
                    'user_id' => 1,
                    'category_id' => 1,
                    'excerpt' => 'blabla tt',
                    'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non 
            risus. Suspendisse lectus tortor, dignissim sit amet, adipiscing nec, ultricies sed, dolor. ',
                    'status' => 'publish',
                    'link_thumbnail' => 'laravel_amsterdam2013.jpg',
                    'created_at' => $dateTime,
                    'updated_at' => $dateTime
                ],
                [
                    'title' => 'PSR-1 Autoload',
                    'slug' => Str::slug('PSR-1 Autoload'),
                    'user_id' => 2,
                    'category_id' => 1,
                    'excerpt' => 'o jsj sjoksdl',
                    'content' => 'ignissim sit amet, adipiscing nec, ultricies sed, dolor. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non 
            risus. Suspendisse lectus tortor.',
                    'status' => 'unpublish',
                    'link_thumbnail' => 'laravel_sjhksd.jpg',
                    'created_at' => $dateTime,
                    'updated_at' => $dateTime
                ],
                [
                    'title' => 'PSR-3 Autoload',
                    'slug' => Str::slug('PSR-1 Autoload'),
                    'user_id' => 2,
                    'category_id' => 1,
                    'excerpt' => 'o jsj sjoksdl',
                    'content' => 'ignissim sit amet, adipiscing nec, ultricies sed, dolor. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non 
            risus. Suspendisse lectus tortor.',
                    'status' => 'publish',
                    'link_thumbnail' => 'laravel_sjhksd.jpg',
                    'created_at' => $dateTime,
                    'updated_at' => $dateTime
                ]
            ]
        );
    }

}
