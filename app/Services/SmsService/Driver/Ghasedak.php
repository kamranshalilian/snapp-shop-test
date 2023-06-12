<?php

namespace App\Services\SmsService\Driver;

use App\Services\SmsService\DriverInterface;
use App\Services\SmsService\DTO\Message;
use GuzzleHttp\Client;

class Ghasedak implements DriverInterface
{
    public static function send(Message $data)
    {
        $client = new Client();
        return $client->post("http://api.smsapp.ir/v2/sms/send/simple\n", [
            'headers' => [
                'apikey'       => env("GHASEDAK_API_KEY"),
                'Content-Type' => 'application/x-www-form-urlencoded'
            ],
            'form_params' => [
                'message' => $data->message,
                'receptor' => $data->receptor,
                'sender' => env("GHASEDAK_DEFAULT_NUMBER"),
                "output\t" => 'Json'
            ]
        ]);
    }
}
