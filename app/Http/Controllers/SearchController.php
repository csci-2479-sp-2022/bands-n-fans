<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\BandInterface;

class SearchController extends Controller
{
    /*
    public function show()
    {
        return view(
            'search-results',
           );
    }
*/
public function __construct(
    private BandInterface $bandService
)
{ }
    public function searchBandsByName(string $name ='')
    {
        return view('search-results', [
            'bands' => $this->bandService->getBands(),
        ]);
    }
}
