<?php

namespace App\Repo;

use App\Jobs\TransactionJob;
use App\Models\Cart;
use App\Models\Transaction;

class TransactionRepo
{
    public $transactionPrice;

    public function store(array $data)
    {
        try {
            $cartFrom = Cart::whit("account")->where("cart_number", $data["cart_number_from"])->first();
            $cartTo = Cart::whit("account")->where("cart_number", $data["cart_number_to"])->first();

            if ($cartFrom?->account?->amount < ($data["price"] + $this->transactionPrice)) {
                throw new \Exception("موجودی حساب کم است");
            }

            $transaction = Transaction::create([
                "status" => "pending",
                "price" => $data["price"],
                "cart_id_from" => $cartFrom->id,
                "cart_id_to" => $cartTo->id,
                "user_id" => auth()->id(),
            ]);
            TransactionJob::dispatch($transaction);
            return $transaction;

        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }
}
