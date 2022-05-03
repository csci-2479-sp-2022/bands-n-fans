<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Band;
use App\Models\Fan;
use App\Contracts\BandInterface;
use App\Http\Requests\BandRequest;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Support\Facades\Auth;

class BandController extends Controller
{

    public function __construct(
        private BandInterface $bandService
    )
    { }

    //show a list of all of the bands in the database
    public function index()
    {
        return view('band-list', [
            'bands' => $this->bandService->getBands(),
        ]);
    }

    //displays a single band record by database id #
    public function show(int $id = null)
    {

        if ($this->bandService->getBandById($id) == null) {
            throw new NotFoundHttpException();
        }

        return view('band-info', [
             'band' => $this->bandService->getBandById($id),
             'bands' => $this->bandService->getBands()
            ]);
    }

    //display the form to add a new band to the database--also grabs the genres to go into the form
    public function create()
    {
        return view ('band-register-form', [
            'genres' => $this->bandService->getGenres(),
        ]);
    }

    //saves the newly created band to the database
    public function store(BandRequest $request)
    {
        //save the band to the database
        $this->bandService->saveBand($request);

        //redirect to the band list page
        return response()->redirectToRoute('bands');
    }

    public function likeBand($id)
    {
        $band = Band::find($id);
        $fan = Fan::make([
            'user_id' => Auth::user()->id,
            'band_id' => $band,
            'fan_since' => date('Y'),
        ]); 
        // $band->like(); 
        $fan->save();

        return redirect()->route('bands')->with('message','Band Like successfully!');
    }

    public function unlikeBand($id)
    {
        $band = Band::find($id);
        $band->unlike();
        $band->save();
        
        return redirect()->route('bands')->with('message','Band Like undo successfully!');
    }

}
