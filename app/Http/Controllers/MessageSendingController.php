<?php

namespace App\Http\Controllers;

use App\Ascendant;
use App\Message;
use App\Subscription;
use Illuminate\Http\Request;

class MessageSendingController extends Controller
{
    public function sendMessages()
    {
        $ascendants = Ascendant::all();
        foreach ($ascendants as $ascendant){

            $message = Message::where('ascendant_id', $ascendant->id)
                ->where('date', date('Y-m-d'))->first()->message;
            $subscribers = Subscription::where('ascendant_id', $ascendant->id)->get();

            foreach ($subscribers as $subscriber){
                $this->sendServer($message, $subscriber->address);
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


        $data = json_decode(file_get_contents('php://input'), true);

        $name = $data["longitude"];
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
