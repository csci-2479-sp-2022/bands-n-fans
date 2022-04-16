<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\UploadedFile;
use Illuminate\Validation\Rule;
use App\Models\Genre;

class BandRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $genreIds = self::getGenreIds();

        return [
            'name' => 'required|string',
            'year' => 'required|date_format:Y',
            'genre' => [Rule::in($genreIds)],
        ];
    }
    public function getBand(): string
    {
        return $this->input('name');
    }

    public function getGenreId(): int
    {
        return $this->input('genre');
    }

    public function hasPhoto(): bool
    {
        return $this->hasFile('photo')
            && $this->file('photo')->isValid();
    }

    public function getPhoto(): UploadedFile
    {
        return $this->file('photo');
    }
/*     public function hasBoxart(): bool
    {
        return $this->hasFile('boxart')
            && $this->file('boxart')->isValid();
    } */

/*     public function getBoxart(): UploadedFile
    {
        return $this->file('boxart');
    } */

    public function getYearFormed(): string
    {
        return $this->input('year');
    }

   private static function getGenreIds(): array
    {
        $idRows = Genre::select('id')->get()->toArray();

        return array_map(fn($row) => $row['id'], $idRows);
    }
}
