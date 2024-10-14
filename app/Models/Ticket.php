<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ticket extends Model
{
    use HasFactory;

    protected $table = 'tickets';

    protected $casts = [
        'check_in_time' => 'date'
    ];

    protected $fillable = ['customer_name', 'seat_number', 'is_checked_in', 'check_in_time', 'movie_id'];

    public function movies():BelongsTo{
        return $this->belongsTo(Movie::class);
    }
}