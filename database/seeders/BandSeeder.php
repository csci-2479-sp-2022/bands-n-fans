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

    //band-detail-ui

        $factory->createMany([
            ['name' => 'Band 1','year_formed' => 1994,'photo' => 'https://live.staticflickr.com/5226/5581837543_9ef80a2fd6_b.jpg',],
            ['name' => 'Band 2','year_formed' => 1995,'photo' => 'https://upload.wikimedia.org/wikipedia/commons/a/aa/Bob_Dylan_and_The_Band_-_1974.jpg',],
            ['name' => 'Band 3','year_formed' => 1996,'photo' => 'https://upload.wikimedia.org/wikipedia/commons/f/ff/Tora_music_band_photo.JPG',],
            ['name' => 'Band 4','year_formed' => 1997,'photo' => 'https://live.staticflickr.com/4569/27060887979_df01e99c74_b.jpg',],
            ['name' => 'Band 5','year_formed' => 1998,'photo' => 'https://p1.pxfuel.com/preview/774/677/112/big-band-musical-instruments-musicians-jazz.jpg',],

            ['name' => 'Band 6','year_formed' => 1994,],
            ['name' => 'Band 7','year_formed' => 1995,],
            ['name' => 'Band 8','year_formed' => 1996,],
            ['name' => 'Band 9','year_formed' => 1997,],
            ['name' => 'Band 10','year_formed' => 1998,],
   //main
        ]);
        DB::table('band_genre')->insert([
            ['band_id' => 1, 'genre_id' => 1,],
            ['band_id' => 1, 'genre_id' => 2,],
            ['band_id' => 2, 'genre_id' => 2,],
            ['band_id' => 3, 'genre_id' => 3,],
            ['band_id' => 4, 'genre_id' => 4,],
            ['band_id' => 5, 'genre_id' => 5,],
        ]);

    }
}
