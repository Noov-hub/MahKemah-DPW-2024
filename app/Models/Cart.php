<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'bag_id', 'shoe_id', 'tent_id', 'total_harga', 'status_konfirmasi', 'id_user'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function bag()
    {
        return $this->belongsTo(Bag::class, 'bag_id');
    }

    public function shoe()
    {
        return $this->belongsTo(Shoe::class, 'shoe_id');
    }

    public function tent()
    {
        return $this->belongsTo(Tent::class, 'tent_id');
    }
    public static function findWithStatus($status)
    {
        return self::where('status_konfirmasi', $status)->get();
    }
}