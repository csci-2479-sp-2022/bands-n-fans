<?php
namespace App\Contracts;

use App\Models\Band;
use App\Http\Requests\BandRequest;

interface BandInterface
{
    function getBands(
        string $orderby = 'name',
        string $direction = 'asc',
        int $limit = 5
    );

    function getBandById(int $id): ?Band;

    function saveBand(BandRequest $request);

    function searchBandsByName(string $name): array;
}
