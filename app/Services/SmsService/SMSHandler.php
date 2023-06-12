<?php

namespace App\Services\SmsService;


use App\Services\SmsService\Driver\Ghasedak;
use App\Services\SmsService\Driver\Kavenegar;

class SMSHandler
{
    public function __construct(DTOInterface $message, Driver $driver)
    {
        if ($driver == Driver::Kavenegar) {
            Kavenegar::send($message);
        } elseif ($driver == Driver::Ghasedak) {
            Ghasedak::send($message);
        }
    }
}
