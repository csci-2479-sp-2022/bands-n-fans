<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Genre;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $factory = Genre::factory();
        $factory->createMany([
            ['name' => 'Alternative','code' => 'ALT',],
            ['name' => 'Blues','code' => 'BLU',],
            ['name' => 'Country','code' => 'CNT',],
            ['name' => 'Easy Listening','code' => 'LIS',],
            ['name' => 'Electronic','code' => 'ELC',],
            ['name' => 'Folk','code' => 'FLK',],
            ['name' => 'Hip Hop','code' => 'HIP',],
            ['name' => 'Jazz','code' => 'JAZ',],
            ['name' => 'Metal','code' => 'MET',],
            ['name' => 'Pop','code' => 'POP',],
            ['name' => 'R&B','code' => 'R&B',],
            ['name' => 'Rock','code' => 'RCK',],
            ['name' => 'Soul','code' => 'SOL',],
        ]);
    }
}




/* DB::table('genres')->insert([
    'name' => 'Alternative',
    'code' => 'ALT',
   ], [
    'name' => 'Blues',
    'code' => 'BLU',
   ], [
    'name' => 'Country',
    'code' => 'CNT',
   ], [
    'name' => 'Easy Listening',
    'code' => 'LIS',
   ], [
    'name' => 'Electronic',
    'code' => 'ELC',
   ], [
    'name' => 'Folk',
    'code' => 'FLK',
   ], [
    'name' => 'Hip Hop',
    'code' => 'HPH',
   ], [
    'name' => 'Jazz',
    'code' => 'JAZ',
   ], [
    'name' => 'Metal',
    'code' => 'MET',
   ], [
    'name' => 'Pop',
    'code' => 'POP',
   ], [
    'name' => 'R&B',
    'code' => 'R&B',
   ], [
    'name' => 'Rock',
    'code' => 'RCK',
   ], [
    'name' => 'Soul',
    'code' => 'SOL',
   ],
        ); */
