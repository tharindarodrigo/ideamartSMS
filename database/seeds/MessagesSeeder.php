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
            ['date'=>date('Y-m-d'), 'ascendant_id'=> 1, 'message'=>'obe jaya ankaya 1'],
            ['date'=>date('Y-m-d'), 'ascendant_id'=> 2, 'message'=>'obe jaya ankaya 2'],
            ['date'=>date('Y-m-d'), 'ascendant_id'=> 3, 'message'=>'obe jaya ankaya 3'],
            ['date'=>date('Y-m-d'), 'ascendant_id'=> 4, 'message'=>'obe jaya ankaya 4'],
            ['date'=>date('Y-m-d'), 'ascendant_id'=> 5, 'message'=>'obe jaya ankaya 5'],
            ['date'=>date('Y-m-d'), 'ascendant_id'=> 6, 'message'=>'obe jaya ankaya 6'],
            ['date'=>date('Y-m-d'), 'ascendant_id'=> 7, 'message'=>'obe jaya ankaya 7'],
            ['date'=>date('Y-m-d'), 'ascendant_id'=> 8, 'message'=>'obe jaya ankaya 8'],
            ['date'=>date('Y-m-d'), 'ascendant_id'=> 9, 'message'=>'obe jaya ankaya 9'],
            ['date'=>date('Y-m-d'), 'ascendant_id'=> 10, 'message'=>'obe jaya ankaya 10'],
            ['date'=>date('Y-m-d'), 'ascendant_id'=> 11, 'message'=>'obe jaya ankaya 11'],
            ['date'=>date('Y-m-d'), 'ascendant_id'=> 12, 'message'=>'obe jaya ankaya 12']
        ]);
    }
}
