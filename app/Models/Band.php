<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Band extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'genre',
    ];

    public function genre()
    {
        return $this->belongsToMany(Genre::class);
    }

    public function fan()
    {
        return $this->belongsToMany(User::class);
    }

    public function member()
    {
        return $this->belongsToMany(User::class);
    }

    public function genreList(): string
    {
        $genreList = [];

        foreach ($this->genres as $genre) {
            array_push($genreList, $genre['name']);
        }

        return implode(', ', $genreList);
    }
}
