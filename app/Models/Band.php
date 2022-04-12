<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Storage;

class Band extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'genre',
        'year_formed',
        'photo',
    ];

    public function genre()
    {
        return $this->belongsToMany(Genre::class);
    }

    public function band_fan()
    {
        return $this->belongsToMany(Fan::class);
    }

    public function member()
    {
        return $this->belongsToMany(User::class);
    }

/*     public function users()
    {
        return $this->belongsToMany(User::class);
    } */

}
