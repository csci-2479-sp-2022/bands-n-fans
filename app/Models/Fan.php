<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fan extends Model
{
    use HasFactory;

        /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'bandID',
        'userID',
        'fanSince',
    ];

    

    public function band()
    {
        return $this->belongsToMany(Band::class);
    }
}
