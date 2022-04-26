<?php
namespace App\Services;

use App\Contracts\BandInterface;
use App\Models\Band;
use App\Models\Genre;
use Illuminate\Http\Request;
use App\Http\Requests\BandRequest;
use Illuminate\Http\UploadedFile;

class BandService implements BandInterface
{
    public function getBandById(int $id): ?Band
    {
        foreach (self::getBands() as $band) {
            if ($band->id === $id) {
                return $band;
            }
        }

        return null;
    }

/*     public function searchBandsByName(string $name): array
    {
        foreach (self::getBands() as $band) {
            if ($band->name === $name) {
                return $band;
            }
        }

        return null;
    } */

    public function getBands(
        string $orderby = 'name',
        string $direction = 'asc',
        int $limit = 5 )
    {

        return Band::with(['genre', 'fan'])->get();
    }

    public function saveBand(BandRequest $request)
    {
        //find the genre parent record
        $genre = Genre::find($request->getGenreId());

        //initialize a band object (not yet saved)
        $band = Band::make([
            'name' => $request->getBand(),
            'year_formed' => $request->getYearFormed(),
        ]);

        //establish the parent-child relationship between genre and band
        $band->genre($genre);

        //if there is a photo, move it and set the path on the band record
        if ($request->hasPhoto())
        {
            $band['photo'] = self::uploadFile($request->getPhoto());
        }

        //save to database
        $band->save();

        //saves the band_genre records in the database
        $bandGenre = Band::where('id', $band->id)->first();
        $bandGenre->genre()->attach([
                    $genre->id,
                ]);

    }

    private static function uploadFile(UploadedFile $file): string
    {
        return $file->store('public');
    }

    //this is to plug the genre list into the form---really needs to be in its own GenreService
    public function getGenres()
    {
        return Genre:: orderBy ('name')->get();
    }

    public function getBands(
        string $orderby = 'name',
        string $direction = 'asc',
        int $limit = 5 )
    {

        return band::with(['genre', 'fan'])->get();
    }

    public function saveBand(BandRequest $request)
    {
        //find the genre parent record
        $genre = Genre::find($request->getGenreId());

        //initialize a band object (not yet saved)
        $band = Band::make([
            'name' => $request->getBand(),
            'year_formed' => $request->getYearFormed(),
        ]);

        //establish the parent-child relationship between genre and band
        $band->genre($genre);

        //if there is a photo, move it and set the path on the band record
        if ($request->hasPhoto())
        {
            $band['photo'] = self::uploadFile($request->getPhoto());
        }

        //save to database
        $band->save();

        //saves the band_genre records in the database
        $bandGenre = Band::where('id', $band->id)->first();
        $bandGenre->genre()->attach([
                    $genre->id,
                ]);

    }

    private static function uploadFile(UploadedFile $file): string
    {
        return $file->store('public');
    }

}
