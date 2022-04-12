<?php

namespace App\Http\Controllers;

use App\Http\Requests\BandRequest;
use App\Models\Genre;
use App\Models\Band;
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

    public function index()
    {
        return view ('band-register-form', [
            'genres' => self::getGenres(),
        ]);
    }

    private static function getGenres()
    {
        return Genre:: orderBy ('name')->get();
    }

    public function create(BandRequest $request)
    {
        //find the genre parent record
        $genre = Genre::find($request->getGenreId());

        //initialize a band object (not yet saved)
        $band = Band::make([
            'name' => $request->getBand(),
            'year_formed' => $request->getYearFormed(),
        ]);

        //establish the parent-child relationship between genre and game
        $band->genre($genre);

        //if there is a photo, move it and set the path on the game record
        if ($request->hasPhoto())
        {
            $band['photo'] = self::uploadFile($request->getPhoto());
        }

        //save to database
        $band->save();

        //redirect to the band list page
        return response()->redirectToRoute('bands');
    }

    private static function uploadFile(UploadedFile $file): string
    {
        return $file->store('public');
    }
}
