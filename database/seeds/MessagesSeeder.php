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
        for ($x = 1; $x < 25; $x++) {
            if ($x > 12) {
                $datetime = new \DateTime('tomorrow');
                $date = $datetime->format('Y-m-d');
                $y = $x-12;
            } else {
                $y=$x;
                $date = date('Y-m-d');
            }

            Message::insert(
                ['date' => $date, 'ascendant_id' => $y, 'message' => 'obe jaya ankaya ' . $x]
            );
        }

    }
}
