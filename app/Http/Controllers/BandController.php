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
        return view('band-info', [ 'bands' => $this->bandService->getBandById($id) ]);
    }

    public function getBandList()
    {
        return view('band-list', [
            'bands' => $this->bandService->getBands(),
        ]);
    }
/*
    private function getBandDetails(int $id)
    {
        $band = $this->bandService->getBandById($id);

        if ($band == null) {
            throw new NotFoundHttpException();
        }

        return view('band-details', [
            'band' => $band,
        ]);
    }
*/
}
