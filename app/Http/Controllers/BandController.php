<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\BandInterface;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class BandController extends Controller
{

    public function __construct(
        private BandInterface $bandService
    )
    { }

    public function viewBand(int $id = null)
    {

        if ($this->bandService->getBandById($id) == null) {
            throw new NotFoundHttpException();
        }

        return view('band-info', [ 'band' => $this->bandService->getBandById($id) ]);
    }

    public function getBandList()
    {
        return view('band-list', [
            'bands' => $this->bandService->getBands(),
        ]);
    }
}
