<?php

use Illuminate\Database\Seeder;
use App\Models\Unit;

class UnitTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $unit = new Unit;
        $unit->name = 'pc';
        $unit->save();
    }
}
