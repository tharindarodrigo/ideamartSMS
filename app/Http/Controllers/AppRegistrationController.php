<?php

namespace App\Http\Controllers;

use App\Subscription;
use Illuminate\Http\Request;

date_default_timezone_set('Asia/Colombo');
ini_set('display_errors', 1);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
ini_set('error_log', 'sms.log');

define('APP_ID', 'APP_033669');
define('APP_PASSWORD', '4b4aad35a36ebb34b8ce6f6a2409d70d');
define('SERVER_URL', 'https://api.dialog.lk/sms/send');
//include_once 'app/lib/SMSReceiver.php';
//require_once 'app/lib/SMSSender.php';
//include_once '../../lib/SMSSender.php';



class AppRegistrationController extends Controller
{
    //



    public function register(Request $request)
    {

        //$sender = new SMSSender(SERVER_URL, APP_ID, APP_PASSWORD);
        $body = $request->all();


        file_put_contents('abc.txt',file_get_contents('php://input'),FILE_APPEND);
        file_put_contents('abc.txt',json_encode($request),FILE_APPEND);


        //$message = $body['message'];
        $version = $body['version'];
        $subscriberId = $body['subscriberId'];
        //$statusCode = $body['statusCode'];
        $applicationId = $body['applicationId'];
        $status = $body['status'];



        $subscription = new Subscription();

        $subscription->addrsss = 'tel:'.$subscriberId;
        $subscription->status = $status;

        if ($status ='REGISTERED'){

            $subscription->save();

            $response = $this->sendServer($status,$subscriberId);
        }

        if ($status='UNREGISTERED') {

            $subscription->delete();
        }

        return "Null";


    }

    public function category(Request $request){



    }

    public function sendServer($message,$subscriberId){

        //var_dump($address);
        $arrayField = array(

            "destinationAddresses" => ['tell:'.$subscriberId],
            "message" => $message,
            "applicationId" => APP_ID,
            "password" => APP_PASSWORD

        )
            ;


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