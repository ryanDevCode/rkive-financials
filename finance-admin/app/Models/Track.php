<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Track extends Model
{
    use HasFactory;

    protected $table = 'budget_track';

    protected $fillable = [
        'track_id',
        'track_date',
        'track_category',
        'track_department',
        'track_amount'
    ];

}
