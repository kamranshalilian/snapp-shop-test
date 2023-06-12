<?php

namespace App\Jobs;

use App\Services\SmsService\Driver;
use App\Services\SmsService\DTOInterface;
use App\Services\SmsService\SMSHandler;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SMSJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(public DTOInterface $message)
    {

    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        new SMSHandler($this->message,Driver::Kavenegar);
    }
}
