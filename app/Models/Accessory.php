<?php

namespace App\Models;

use App\Models\Costume;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Accessory extends Model
{
    use HasFactory;

    protected $guards = [];

    public function costume()
    {
        return $this->belongsTo(Costume::class);
    }
}