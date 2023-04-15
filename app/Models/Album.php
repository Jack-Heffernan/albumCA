<?php

namespace App\Models;

use App\Models\Genre;
use App\Models\Artist;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Album extends Model
{

    use HasFactory;

    protected $guarded = [];

    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }

    public function artists()
    {
        return $this->belongstoMany(Artist::class)->withTimestamps();
    }
}
