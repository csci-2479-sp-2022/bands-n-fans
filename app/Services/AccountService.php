<?php
namespace App\Services;

use App\Contracts\UserInterface;
use App\Models\User;
use App\Models\Band;

class AccountService implements UserInterface
{
    public function getBandsByUserId(int $id)
    {
        // foreach (self::getUser() as $user) {
        //     if ($user->id === $id) {
        //         return $user;
        //     }
        // }

        return [
            Band::make([
                'id' => 1,
                'name' => 'user band 1',
                'genre' => 'Heavy Metal',
            ]),
            Band::make([
                'id' => 2,
                'name' => 'user band 2',
                'genre' => 'Rap',
            ]),
            Band::make([
                'id' => 3,
                'name' => 'user band 2',
                'genre' => 'Country',
            ]),
        ];
    }
}

