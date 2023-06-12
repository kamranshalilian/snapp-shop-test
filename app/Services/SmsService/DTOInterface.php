<?php

namespace App\Services\SmsService;

interface DTOInterface
{
    public  function __construct($receptor, $message);

}
