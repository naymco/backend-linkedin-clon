<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Facade\DB;

class images extends Seeder
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
}
