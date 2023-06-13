<?php

namespace App\Repo;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;

class UserRepo
{
    public function getThreeGay()
    {
        return User::with(["transaction.cartFrom"])
            ->whereHas("transaction", function (Builder $query) {
                $query->where('status', 'success');
            })
            ->withCount(["transaction" => function (Builder $query) {
                $query->whereTime("created_at", ">", Carbon::now()->subMinutes(10)->format("H:i:s"))
                    ->where("status", "success");
            }])
            ->orderByDesc("transaction_count")
            ->take(3)
            ->get();
    }
}
