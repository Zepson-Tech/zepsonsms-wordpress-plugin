<?php
// To run this file: `php example.php`

require 'vendor/autoload.php';

use ZepsonSms\SDK\ZepsonSms;

$sms = new ZepsonSms(['apiKey' => '']);

$res = $sms->sendSms(['recipient' =>  '255747991498', 'message' => 'Hello World D', 'sender_id' => 'ZEPSONSMS']);

print_r($res);
