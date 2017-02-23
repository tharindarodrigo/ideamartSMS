<?php

namespace App\Http\Controllers;

use App\Ascendant;
use App\Message;
use App\Subscription;
use Illuminate\Http\Request;


//date_default_timezone_set('Asia/Colombo');
//ini_set('display_errors', 1);
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);
//ini_set('error_log', 'sms.log');

define('APP_ID', 'APP_033669');
define('APP_PASSWORD', '4b4aad35a36ebb34b8ce6f6a2409d70d');
define('SERVER_URL', 'https://api.dialog.lk/sms/send');

class MessageSendingController extends Controller
{
    public function sendMessages()
    {
        $ascendants = Ascendant::all();

//        dd($ascendants);

        foreach ($ascendants as $ascendant) {

            $message = Message::where('ascendant_id', $ascendant->id)
                ->where('date', date('Y-m-d'))->first();
//dd($message);
            if (count($message)) {
                dd($message->message);

                $subscribers = Subscription::where('ascendant_id', $ascendant->id)
                    ->where('status', 'SUBSCRIBED')
                    ->get();

                if (count($subscribers)) {
//                    $count=0;
                    foreach ($subscribers as $subscriber) {
                        $this->sendServer($message, $subscriber->address);
//                        $count++;
                    }
                }
            }

        }
    }

    public function sendServer($message, $subscriberId)
    {

        //var_dump($address);
        $arrayField = array(

            "destinationAddresses" => [$subscriberId],
            "message" => $message,
            "applicationId" => APP_ID,
            "password" => APP_PASSWORD

        );


        $jsonObjectFields = json_encode($arrayField);
        return $this->sendRequest($jsonObjectFields);


//        $data = json_decode(file_get_contents('php://input'), true);
//
//        $name = $data["longitude"];
        //var_dump($this->sendRequest($jsonObjectFields));
    }

    private function sendRequest($jsonObjectFields)
    {
        $ch = curl_init('https://api.dialog.lk/sms/send');
        // $this->log->LogDebug("Request: ".$jsonObjectFields);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonObjectFields);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $res = curl_exec($ch);
        //$this->log->LogDebug("Response:".$res);
        curl_close($ch);
        return $res;
        //var_dump(return $this->handleResponse($res));
    }
}
