<?php
namespace App\Services;

use App\Contracts\UserInterface;
use App\Models\User;
use App\Models\Fan;

class AccountService implements UserInterface
{
    public function getBandsByUserId(int $id): ?User
    {
        foreach (self::getUser() as $user) {
            if ($user->id === $id) {

                foreach (self::getFans() as $fans)
                    if ($fans->id === $id) {
                // return $user;
                // need to use $user here to then find any bands that the user is a fan of, and return the bands
                // WIP; JUST MAKE SURE THIS DOESN'T BLOW UP
            }
        }
    }
        return null;
    }

/*     public function getUser(
        string $orderby = 'name',
        string $direction = 'asc',
        int $limit = 5 ): array
    {
        return [
            User::make([
                'id' => 1,
                'name' => 'joe',
                'email' => 'joe@gmail.com',
                'password' => 'joepw',
            ]),
            User::make([
                'id' => 2,
                'name' => 'shaheem',
                'email' => 'shaheem@gmail.com',
                'password' => 'shaheempw',
            ]),
            User::make([
                'id' => 3,
                'name' => 'James',
                'email' => 'james@gmail.com',
                'password' => 'jamespw',
            ]),

        ];
    }

    public function getFans(): array
    {
        return [
            new Fan(1, 1, 1971),
            new Fan(2, 2, 1972),
            new Fan(3, 3, 1973),
        ];
    } */
}

