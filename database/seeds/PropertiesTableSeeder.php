<?php

use Illuminate\Database\Seeder;

class PropertiesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('properties')->delete();
        
        \DB::table('properties')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Color',
                'note' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2020-04-13 04:26:41',
                'updated_at' => '2020-04-13 04:26:41',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Volume',
                'note' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2020-04-13 07:58:18',
                'updated_at' => '2020-04-13 07:58:18',
            ),
        ));
        
        
    }
}