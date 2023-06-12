<?php

namespace App\Services\SmsService\DTO;

use App\Services\SmsService\DTOInterface;

class Message implements DTOInterface
{
    public readonly string $receptor;
    public readonly string $message;

    public function __construct($receptor, $message)
    {
        $this->receptor = $receptor;
        $this->message = $message;
    }
}
