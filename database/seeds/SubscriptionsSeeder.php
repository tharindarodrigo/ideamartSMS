<?php

use Illuminate\Database\Seeder;
use App\Subscription;

class SubscriptionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $status = ['SUBSCRIBED', 'UNSUBSCRIBED'];
        for ($x = 0; $x < 100; $x++) {
            Subscription::insert(
                ['address' => str_random(32), 'ascendant_id' => rand(1, 12), 'status' => $status[rand(0, 1)]]
            );
        }

    }
}
