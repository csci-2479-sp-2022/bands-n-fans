<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Fan extends Pivot
{
    use HasFactory;

    protected $fillable = [
        'band_id',
        'user_id',
        'fan_since',
    ];


    public function band()
    {
        return $this->belongsToMany(Band::class);
    }
    public function user()
    {
        return $this->belongsToMany(User::class);
    }
}
