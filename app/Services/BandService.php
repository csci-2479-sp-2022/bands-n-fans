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


    public function getBands()
    {
        return Band::all();
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
