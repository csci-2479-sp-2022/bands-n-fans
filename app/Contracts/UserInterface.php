<?php
namespace App\Contracts;

use App\Models\User;

interface UserInterface
{
    function getBandsByUserId(int $id): ?User;

    function getUser(): array;

}
