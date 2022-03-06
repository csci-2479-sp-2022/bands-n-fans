<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BandController extends Controller
{
    public function viewBand(int $id){
        return view(
            'band-info', 
           );
    
        // return view('band-info', [
        //     'band' => Band::findOrFail($id)
        // ]);
    }
}
