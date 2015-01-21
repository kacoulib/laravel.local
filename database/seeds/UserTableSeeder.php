<?php

class UserTableSeeder extends Seeder {

    public function run() {
        DB::table('users')->delete();
        DB::statement("ALTER TABLE users AUTO_INCREMENT=1");
        $dateTime = new DateTime('now');
        $dateTime = $dateTime->format('Y-m-d H:i:s');
        DB::table('users')->insert(
            [
                [
                    'username' => 'Karim',
                    'email' => 'coulibaly91karim@gmail.com',
                    'password' => Hash::make('karim')
                ],
                [
                    'username' => 'antoine',
                    'email' => 'antoine.luscko@wanadoo.fr',
                    'password' => Hash::make('antoine')
                ]
            ]
        );
    }

}
