<?php

namespace App\Services\SmsService\Driver;

use App\Services\SmsService\DTO\Message;
use Kavenegar\Exceptions\ApiException;
use Kavenegar\Exceptions\HttpException;
use Kavenegar\KavenegarApi;

class Kavenegar
{
    public static function send(Message $data)
    {
        try {
            $api = new KavenegarApi(env("ِKAVENEGAR_API_KEY"));
            $api->Send(env("KAVENEGAR_DEFAULT_NUMBER"), $data->receptor, $data->message);
        } catch
        (ApiException $e) {
            throw $e->errorMessage();
        } catch (HttpException $e) {
            throw $e->errorMessage();
        }
    }
}
