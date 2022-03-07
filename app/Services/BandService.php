<?php

namespace App\Services;

use App\Contracts\BandInterface;
use App\Services\BandService;


class BandService
{
    public function GetBandById(int $id): Band
    {
        foreach (self::getBand() as $band) {
            if ($band->id === $id) {
                return $band;
            }
        }

        return null;
    }

    /**
     * pretend this is making a call to a service layer that in turn calls a data layer
     */
    public function getBands(): array
    {
        //need optional $orderBy, $direction, and $limit params

        
    }


    public function searchBandsByName($name): array
    {
        //TBD

        
    }


}