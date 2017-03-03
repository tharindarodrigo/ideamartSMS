<?php

use Illuminate\Database\Seeder;
use App\Ascendant;

class AscendantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Ascendant::insert([
            ['name'=>'Mesha'],
            ['name'=>'Wrushaba'],
            ['name'=>'Mithuna'],
            ['name'=>'Kataka'],
            ['name'=>'Sinha'],
            ['name'=>'Kanya'],
            ['name'=>'Thula'],
            ['name'=>'Wrushwika'],
            ['name'=>'Danu'],
            ['name'=>'Makara'],
            ['name'=>'Kumba'],
            ['name'=>'Meena']
        ]);
    }
}
