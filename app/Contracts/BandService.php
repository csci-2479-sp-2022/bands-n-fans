<?php
namespace App\Contacts;

use App\Models\Band;

interface BandService
{
    function getBandById(int $id): Band;

    function getBands(string $orderby = 'name', string $direction = 'ascend', int $limit = 10): array;

    function searchBandsByName(string $name): array;
}
