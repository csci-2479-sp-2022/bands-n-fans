<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\BandInterface;

class BandController extends Controller
{
    public function __construct(
        private BandInterface $bandInterface
    )
    { }


    public function viewBand(int $id){
        return view(
            'band-info', 
           );
    
    }
}
