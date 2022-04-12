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
        //$bands = Band::get();
/*         $bands->each(function($item, $key)
        {
            echo count($item->genre);
        }); */
       /*  $bands->each(function($item, $key)
        {
            echo $item->name;
            echo $item->year_formed;
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
