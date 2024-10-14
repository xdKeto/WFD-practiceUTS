<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Movie extends Model
{
    use HasFactory;

    protected $table = 'movies';

    protected $casts = [
      'release_date' => 'date',  
    ];

    protected $fillable = ['movie_title', 'duration', 'release_date'];

    public function tickets():HasMany{
        return $this->hasMany(Ticket::class);
    }
}