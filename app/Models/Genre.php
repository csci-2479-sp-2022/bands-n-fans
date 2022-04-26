<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Model\Band;

class Genre extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function bands()
    {
        return $this->hasMany(Band::class);
    }
}
