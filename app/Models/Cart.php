<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $guarded = ["id"];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function account()
    {
        return $this->belongsTo(Account::class);
    }

    public function transactionFrom()
    {
        return $this->hasMany(Transaction::class,"cart_id_from");
    }

    public function transactionTo()
    {
        return $this->hasMany(Transaction::class,"cart_id_to");
    }
}
