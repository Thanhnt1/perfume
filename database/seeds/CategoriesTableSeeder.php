<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('categories')->delete();
        
        \DB::table('categories')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Attars',
                'description' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2020-03-29 03:26:38',
                'updated_at' => '2020-03-29 03:26:38',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Men’s Perfumes',
                'description' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2020-03-29 03:26:47',
                'updated_at' => '2020-03-29 03:26:47',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Women’s Perfumes',
                'description' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2020-03-29 03:26:56',
                'updated_at' => '2020-03-29 03:26:56',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Gift Sets',
                'description' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2020-03-29 03:27:04',
                'updated_at' => '2020-03-29 03:27:04',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Deodorants',
                'description' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2020-03-29 03:27:10',
                'updated_at' => '2020-03-29 03:27:10',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Body Mists',
                'description' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2020-03-29 03:27:18',
                'updated_at' => '2020-03-29 03:27:18',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'Air Freshners',
                'description' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2020-03-29 03:27:25',
                'updated_at' => '2020-03-29 03:27:25',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'Teens Perfume',
                'description' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2020-03-29 03:27:33',
                'updated_at' => '2020-03-29 03:27:33',
            ),
        ));
        
        
    }
}