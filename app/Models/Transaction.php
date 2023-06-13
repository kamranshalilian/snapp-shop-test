<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $with = [
        "cartFrom.account",
        "cartTo.account",
    ];

    protected $guarded = ["id"];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function cartFrom()
    {
        return $this->belongsTo(Cart::class,"cart_id_from");
    }

    public function cartTo()
    {
        return $this->belongsTo(Cart::class,"cart_id_to");
    }
}
