<?php
namespace App\Contracts;

use App\Models\Band;

interface BandInterface
{
    function getBandById(int $id): Band;

    function getBands(): array;
}