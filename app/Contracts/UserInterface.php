<?php
namespace App\Contracts;

use App\Models\Band;

interface UserInterface
{
    function getBandsByUserId(int $id);

}
