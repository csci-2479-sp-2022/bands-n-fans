<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\UserInterface;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;


class AccountController extends Controller
{
    public function __construct(
        private UserInterface $userService
    )
    { }

    public function show()
    {
        return view('account-profile', [
            'bands' => $this->userService->getBandsByUserId(8),
        ]);
    }
}


