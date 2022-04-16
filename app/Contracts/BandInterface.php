<?php
namespace App\Contracts;

use App\Models\Band;

interface BandInterface
{
    function getBandById(int $id): ?Band;

<<<<<<< HEAD
    function getBands(
        string $orderby = 'name',
        string $direction = 'asc',
        int $limit = 5 );
=======
    function getBands();
>>>>>>> main

    function searchBandsByName(string $name): array;
}
