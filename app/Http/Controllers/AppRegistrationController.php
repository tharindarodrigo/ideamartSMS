<?php

namespace App\Http\Controllers;

use App\Ascendant;
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
//

//        dd($body);

//        file_put_contents('abc.txt', file_get_contents('php://input'), FILE_APPEND);
//        file_put_contents('abc.txt', json_encode($request), FILE_APPEND);
        $ascendants = Ascendant::orderBy('id')->pluck('name', 'id');
        $ascendantList = '
        ';
        foreach ($ascendants as $ascendant_id => $ascendant) {
            $ascendantList .= $ascendant_id . '. ' . $ascendant . '
            ';
        }

        $msg = "Obage lagnaya palapala danaganimata lagnayata adala ankaya athulu karanna
        Eg - IT(space) 4 send to 77100 for kataka lagna".
        $ascendantList;
        //$message = $body['message'];
        $version = $body['version'];
        $subscriberId = $body['subscriberId'];
        //$statusCode = $body['statusCode'];
        $applicationId = $body['applicationId'];
        $status = $body['status'];

        $subscription = new Subscription();

        $subscription->address = 'tel:' . $subscriberId;
        $subscription->status = $status;

        if ($status = 'REGISTERED') {
            if ($subscription->save()) {

                return $this->sendServer($msg, $subscriberId);
//                return 'True';
            }

        }

        if ($status = 'UNREGISTERED') {

            //$subscription->delete();

        }

        return 'False';


    }

    public function setAscendant(Request $request)
    {
        $body = $request->all();

        $subscriberId = $body['subscriberId'];

        $subscription = Subscription::where('address', $subscriberId)->get();
        $subscription->ascendant_id = substr($body['message'], 3, strlen($body['msg']));
        $msg = 'You have registered for '. Ascendant::find($subscription->ascendant_id )->name;

        return $this->sendServer($msg, $subscriberId);

    }

    public function category(Request $request)
    {


    }

    public function sendServer($message, $subscriberId)
    {

        //var_dump($address);
        $arrayField = array(

            "destinationAddresses" => ['tel:'.$subscriberId],
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
