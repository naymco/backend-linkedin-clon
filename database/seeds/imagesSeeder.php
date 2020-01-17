<?php

use Illuminate\Database\Seeder;

class imagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // poblar la base de datos con información sobre imágenes
        DB::table('images')->insert([
            'image_path' => Str::random(10),
            'description' => Str::random(10)
        ]);
    }

//    public function run()
//    {
//        factory(App\User::class, 50)->create()->each(function ($user) {
//            $user->comments()->save(factory(App\Comment::class)->make());
//        });
//    }
}
