<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Search;

class SearchController extends Controller
{
    public function show()
    {
        return view(
            'search-results', 
           );
    }
}
