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
        int $limit = 5 ): array
    {
        return [
            Band::make([
                'id' => 1,
                'name' => 'Pantera',
                'genre' => 'Heavy Metal',
            ]),
            Band::make([
                'id' => 2,
                'name' => 'Snoop Dog',
                'genre' => 'Rap',
            ]),
            Band::make([
                'id' => 3,
                'name' => 'George Strait',
                'genre' => 'Country',
            ]),
        ];
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
