<?php

namespace App\Models;

use App\Models\Costume;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $guards = [];

    protected $fillable = [
        'name',
        'email',
        'telp_numb',
        'whatsapp',
        'instagram',
        'address',
        'family_number1',
        'family_number2',
        'province',
        'city',
        'district',
        'post_code',
        'KTP_pict',
        'KTP_selfie',
        'costume_id',
        'rent_date',
        'ship_date',
        'payment_status',
        'total_price',
        'DP',
        'shiping',
        'code'
    ];
    public function costume()
    {
        return $this->belongsTo(Costume::class);
    }
}