<?php

namespace App\Jobs;

use App\Models\Transaction;
use App\Services\SmsService\DTO\Message;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class TransactionJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(public Transaction $transactionModel)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $accountFrom = $this->transactionModel->cartFrom->account;
        $accountTo = $this->transactionModel->cartTo->account;

        $total = ($this->transactionModel->price + $this->transactionModel->transaction_price);

        $accountFrom->amount -= $total;
        $accountTo->amount += $this->transactionModel->price;

        $accountFrom->save();
        $accountTo->save();

        $this->transactionModel->status = "success";
        $this->transactionModel->save();
        $userFrom = $accountFrom->user()?->frist();
        $userTo = $accountTo->user()?->frist();

        $messageFrom = new Message(
            $userFrom->phone,
            " $accountFrom->account_number برداتشت وجه از حسابه شماره : " . " $total و به مبلغ : " . " $this->transactionModel->created_at : در تاریخ  "
        );

        $messageTo = new Message(
            $userTo->phone,
            " $accountTo->account_number واریز وجه به حسابه شماره : " . " $this->transactionModel->price و به مبلغ : " . " $this->transactionModel->created_at : در تاریخ  "
        );
        SMSJob::dispatch($messageFrom);
        SMSJob::dispatch($messageTo);
    }
}
