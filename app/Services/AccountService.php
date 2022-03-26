<?php
namespace App\Services;

use App\Contracts\UserInterface;
use App\Models\User;

class AccountService implements UserInterface
{
    public function getBandsByUserId(int $id): ?User
    {
        foreach (self::getUser() as $user) {
            if ($user->id === $id) {
                return $user;
            }
        }

        return null;
    }

    public function getUser(): array
    {
        return [
            new User(1, '', '', ''),
            new User(2, '', '', ''),
            new User(3, '', '', ''),
        ];
    }
}

