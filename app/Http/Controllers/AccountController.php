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

    public function showUserBands(int $id = null)
    {

        if ($this->acccountService->getBandsByUserId($id) == null) {
            throw new NotFoundHttpException();
        }

        return view('account-profile', [ 'bands' => $this->acccountService->getBandsByUserId($id) ]);
    }
}
