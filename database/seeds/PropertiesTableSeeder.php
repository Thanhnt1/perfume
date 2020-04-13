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
                'name' => 'Width',
                'note' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2020-04-13 04:26:44',
                'updated_at' => '2020-04-13 04:26:44',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Weight',
                'note' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2020-04-13 07:58:03',
                'updated_at' => '2020-04-13 07:58:03',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Height',
                'note' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2020-04-13 07:58:11',
                'updated_at' => '2020-04-13 07:58:11',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Volume',
                'note' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2020-04-13 07:58:18',
                'updated_at' => '2020-04-13 07:58:18',
            ),
        ));
        
        
    }
}