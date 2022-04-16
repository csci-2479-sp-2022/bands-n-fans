<?php
namespace App\Services;

use App\Contracts\BandInterface;
use App\Models\Band;

class BandService implements BandInterface
{
    public function getBandById(int $id): ?Band
    {
        foreach (self::getBands() as $band) {
            if ($band->id === $id) {
                return $band;
            }
        }

        return null;
    }


    public function getBands(
        string $orderby = 'name',
        string $direction = 'asc',
        int $limit = 5 )
    {

        return band::with(['genre', 'fan'])->get();
        //$bands = band::with(['genre', 'fan'])->get();
        //$bands->flatten();

        //$flat = $bands->flatten();
        //echo $bands;
        //$bands = Band::get();
/*         $bands->each(function($item, $key)
        {
            $genre = $item->genre;

            $genre->each(function($item, $key)
            {
                echo $item->name;


            });
        }); */
/*         $bands->each(function($item, $key)
        {
                $array = $item->toArray();
                //var_dump($array['genre']);

                foreach($array['genre'] as $genre) {
                    var_dump($genre['name']);
                }
        }); */
        //$bands->map(function($item, $key){return $item;});
        //var_dump($array);
        //die();
        //return $bands->toArray();


/*         return [
            Band::make([
                'id' => '1',
                'name' => 'Pantera',
                'genre' => 'Heavy Metal',
                'year_formed' => 1959,
            ]),
            Band::make([
                'id' => '2',
                'name' => 'Snoop Dog',
                'genre' => 'Rap',
                'year_formed' => 2020,
            ]),
            Band::make([
                'id' => '3',
                'name' => 'George Strait',
                'genre' => 'Country',
                'year_formed' => 2013,
            ]),
        ]; */
    }

    public function searchBandsByName(string $name): array
    {
        foreach (self::getBands() as $band) {
            if ($band->name === $name) {
                return $band;
            }
        }

        return null;
    }

}
