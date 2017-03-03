<?php

namespace App\Http\Controllers;

use App\Message;
use App\Subscription;
use Illuminate\Http\Request;

class SubscriptionsController extends Controller

{

    private $APP_ID = 'APP_033669';
    private $APP_PASSWORD = '4b4aad35a36ebb34b8ce6f6a2409d70d';
    private $SERVER_URL = 'https://api.dialog.lk/sms/send';

    public function __construct(Request $request)
    {
//        dd($request->all());
    }

    public function index()
    {
        $subscriptions = Subscription::all();
        return $subscriptions;
    }


    public function create()
    {
//        $messages = Message::with()->where('date', date('Y-m-d'))->get();
    }


    public function store(Request $request)
    {

    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
