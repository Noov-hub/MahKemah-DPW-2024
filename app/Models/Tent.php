<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tent extends Model
{
    protected $fillable = [
        'brand', 'image', 'price', 'status'
    ];
    public static function findWithStatus($status)
    {
        return self::where('status', $status)->get();
    }
}
