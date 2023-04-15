<?php

namespace App\Models;

use App\Models\Album;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Artist extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function albums()
    {
        return $this->belongstoMany(Album::class);
    }
}
