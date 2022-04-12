<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Band;
use DB;

class BandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $factory = Band::factory();
        $factory->createMany([
            ['name' => 'Band 1','year_formed' => 1994,],
            ['name' => 'Band 2','year_formed' => 1995,],
            ['name' => 'Band 3','year_formed' => 1996,],
            ['name' => 'Band 4','year_formed' => 1997,],
            ['name' => 'Band 5','year_formed' => 1998,],
        ]);
        DB::table('band_genre')->insert([
            ['band_id' => 1, 'genre_id' => 1,],
            ['band_id' => 2, 'genre_id' => 2,],
            ['band_id' => 3, 'genre_id' => 3,],
            ['band_id' => 4, 'genre_id' => 4,],
            ['band_id' => 5, 'genre_id' => 5,],
        ]);

    }
}
