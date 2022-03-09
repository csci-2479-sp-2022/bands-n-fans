<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\UserInterface;

class AccountController extends Controller
{
    public function __construct(
        private UserInterface $userService
    )
    { }

    public function show()
    {
        return view('account-profile',);
    }
}
