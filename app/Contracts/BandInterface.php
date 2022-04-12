<?php
namespace App\Contracts;

use App\Models\Band;

interface BandInterface
{
    function getBandById(int $id): ?Band;

    function getBands(
        string $orderby = 'name',
        string $direction = 'asc',
        int $limit = 5 );

    function searchBandsByName(string $name): array;
}
