<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\BandInterface;
use App\Http\Requests\SearchRequest;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

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
    
    public function searchResults(string $query)
    {
        return view('search-results', [
            'bands' => $this->bandService->searchBand($query),
            'query' => $query,
        ]);
    }

    public function searchBandsByName(SearchRequest $request)
    {    
        $query = $request->getSearch();

        return response()->redirectToRoute('search-results', ['query' => $query]);
    }

    public function noSearchResults()
    {    
        return view('no-search-results');
    }
    
}
