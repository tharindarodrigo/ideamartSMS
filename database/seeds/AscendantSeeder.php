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
            ['name'=>'Vushbha'],
            ['name'=>'Mithuna'],
            ['name'=>'Kataka'],
            ['name'=>'Sinha'],
            ['name'=>'Kanya'],
            ['name'=>'Thula'],
            ['name'=>'Vushchika'],
            ['name'=>'dhanu'],
            ['name'=>'Makara'],
            ['name'=>'Kumbha'],
            ['name'=>'Meena']
        ]);
    }
}
