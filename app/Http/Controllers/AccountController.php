<?php

namespace App\Http\Controllers;
use App\Models\Fan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Contracts\UserInterface;
use App\Contracts\BandInterface;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;


class AccountController extends Controller
{
    public function __construct(
        /* private UserInterface $userService, */
        private BandInterface $bandService
    )
    { }

    public function show()
    {
        return view('account-profile', [
            'bands' => $this->bandService->getBandsByUserId(Auth::user()->id),
        ]);
    }
}
