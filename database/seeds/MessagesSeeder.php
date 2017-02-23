<?php

use Illuminate\Database\Seeder;
use App\Message;

class MessagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Message::insert([
            ['date'=>date('Y-m-d'), 'ascendant_id'=> 1, 'message'=>'obata subhai'],
            ['date'=>date('Y-m-d'), 'ascendant_id'=> 2, 'message'=>'obe jaya warnaya kaha'],
            ['date'=>date('Y-m-d'), 'ascendant_id'=> 3, 'message'=>'obe jaya ankaya 5']
        ]);
    }
}
