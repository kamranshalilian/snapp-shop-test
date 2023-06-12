<?php

namespace App\Services\SmsService;

use App\Services\SmsService\DTO\Message;

interface DriverInterface
{
    public static function send(Message $data);

}
