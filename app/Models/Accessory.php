<?php

namespace App\Models;

use App\Models\Costume;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Accessory extends Model
{
    use HasFactory, SoftDeletes;

    protected $guards = [];

    protected $fillable = [
        'name',
        'price',
        'status',
        'costume_id'
    ];
    public function costume()
    {
        return $this->belongsTo(Costume::class);
    }
}