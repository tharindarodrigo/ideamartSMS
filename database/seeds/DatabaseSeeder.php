<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(AscendantSeeder::class);
         $this->call(MessagesSeeder::class);
//         $this->call(SubscriptionsSeeder::class);
    }
}
