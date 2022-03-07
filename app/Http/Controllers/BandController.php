<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\BandService;
use App\Model\Band;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class BandController extends Controller
{

    public function __construct(
        private BandService $bandService
    )
    { }
    /*
        public function viewBand(int $id){
            return view('band-info', [ 'band' => $this->bandService->getBandById($id) ]);

        }
    */

    public function viewBand(?int $id = null)
    {
        if (is_int($id)) {
            return $this->getBandDetails($id);
        }

        return $this->getBandList();
    }

    private function getBandList()
    {
        return view('band-list', [
            'bands' => $this->bandService->getBands(),
        ]);
    }

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

    private static function getBands()
    {
        return [
            Band::make([
                'id' => 1,
                'name' => 'Metallica',
                'genre' => 'Metal',
            ]),
            Band::make([
                'id' => 2,
                'name' => 'Snoop Dog',
                'genre' => 'Rap',
            ]),
        ];
    }

}
