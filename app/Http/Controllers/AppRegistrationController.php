<?php

namespace App\Http\Controllers;

use App\Ascendant;
use App\FirstMessage;
use App\Subscription;
use Illuminate\Http\Request;

//date_default_timezone_set('Asia/Colombo');
//ini_set('display_errors', 1);
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);
//ini_set('error_log', 'sms.log');

define('APP_ID', 'APP_034129');
define('APP_PASSWORD', '55df366779d42fda970e838ace3e749d');
define('SERVER_URL', 'https://api.dialog.lk/sms/send');
//include_once 'app/lib/SMSReceiver.php';
//require_once 'app/lib/SMSSender.php';
//include_once '../../lib/SMSSender.php';


class AppRegistrationController extends Controller
{

    public function register(Request $request)
    {

        //$sender = new SMSSender(SERVER_URL, APP_ID, APP_PASSWORD);
        $body = $request->all();

        $ascendants = Ascendant::orderBy('id')->pluck('name', 'id');
        $ascendantList = '
    ';
        foreach ($ascendants as $ascendant_id => $ascendant) {
        $ascendantList .= $ascendant_id . '. ' . $ascendant . '
    ';
        }

    $msg = "Obage lagnayata adala lagna palaa pala danagnima sadaha PM (Space) lagnayata adala ankaya athulath kara 77111 ta ewanna.
Eg: Obage lagnaya sinha nam 
PM (Space) 5 lesa type kara 77111 ta ewanna." .
            $ascendantList;
        //$message = $body['message'];
        $version = $body['version'];
        $subscriberId = $body['subscriberId'];
        //$statusCode = $body['statusCode'];
        $applicationId = $body['applicationId'];
        $status = $body['status'];

        $subs = Subscription::where('address', 'tel:' . $subscriberId)->first();

        if (count($subs)) {
            $subs->status = $status;
            $subs->save();

        } else {

            $subscription = new Subscription();
            $subscription->address = 'tel:' . $subscriberId;
            $subscription->status = $status;
            $subscription->save();
        }

        return $this->sendServer($msg, 'tel:' . $subscriberId);


    }

    public function setAscendant(Request $request)
    {
        $body = $request->all();

        $sourceAddress = $body['sourceAddress'];
        $msg = $body['message'];

        $msg = str_replace(",", "", $msg);

        $msg = strtolower($msg);
        $split = explode(' ', $msg);

        if ($split[1] > 0 && $split[1] <= 12) {
            $subscription = Subscription::where('address', $sourceAddress)->first();
            $subscription->ascendant_id = $split[1];
            $subscription->save();
            $res = 'You have registered for ' . Ascendant::findOrFail($split[1])->name;
        } else {
            $res = 'Invalid Response';
        }

//        $subscription = Subscription::where('address', $sourceAddress)->first();
//        $subscription->ascendant_id = $split[1];
//        $res = 'You have registered for '. Ascendant::findOrFail($subscription->ascendant_id )->name;

        $this->sendServer($res, $sourceAddress);

        $firstMessage = FirstMessage::where('ascendant_id',$subscription->ascendant_id)->first();
        $this->sendServer($firstMessage->message, $sourceAddress);
    }

    public function category(Request $request)
    {


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
