<?php

namespace App\Http\Controllers;

use App\Http\Requests\TransactionRequest;
use App\Models\User;
use App\Repo\TransactionRepo;
use App\Repo\UserRepo;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;


class TransactionController extends Controller
{
    public function __construct(public TransactionRepo $transactionRepo, public UserRepo $userRepo)
    {

    }

    public function log()
    {
        return $this->userRepo->getThreeGay();
    }

    public function transaction(TransactionRequest $request)
    {
        return $this->transactionRepo->store($request->toArray());
    }
}
