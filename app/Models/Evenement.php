<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Evenement extends Model
{
    use HasFactory;

    public function scopeDateRange(Builder $query,$arrayRange)
    {
        return $query->whereBetween('date_start', [$arrayRange[0] , $arrayRange[1]]);
    }

    protected $fillable = [
        'title',
        'description',
        'date_start',
        'time_start'     
    ];
}
