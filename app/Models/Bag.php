<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Model;

class Bag extends Model
{
    /**
     * Find all bags with status 1.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public static function findWithStatus($status)
    {
        return self::where('status', $status)->get();
    }
    protected $fillable = [
        'brand', 'image', 'price', 'status'
    ];
}
