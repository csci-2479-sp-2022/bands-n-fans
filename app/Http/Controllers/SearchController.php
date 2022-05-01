<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\BandInterface;
use App\Http\Requests\SearchRequest;

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
    
    public function searchBandsByName(SearchRequest $request)
    {
        return view('search-results', [
            'bands' => $this->bandService->searchBand($search),
        ]);
    }
    
}
