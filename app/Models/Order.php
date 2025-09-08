<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = ['id'];

    public static function generateOrderId()
    {
        $timestamps = now()->format('YmdHis');
        $random = strtoupper(Str::random(4));
        return 'TIKET-' . $timestamps . '-' . $random;
    }
}
