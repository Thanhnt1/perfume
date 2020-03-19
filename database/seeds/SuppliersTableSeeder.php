<?php

use Illuminate\Database\Seeder;

class SuppliersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('suppliers')->delete();
        
        \DB::table('suppliers')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Calvin Klein',
                'phone' => '0123456789',
                'email' => 'test@example.com',
                'address' => '1 example , Example , Example',
                'deleted_at' => NULL,
                'created_at' => '2020-03-17 08:19:52',
                'updated_at' => '2020-03-17 08:19:52',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Davidoff',
                'phone' => '0123456789',
                'email' => 'test@example.com',
                'address' => '1 example , Example , Example',
                'deleted_at' => NULL,
                'created_at' => '2020-03-17 08:19:52',
                'updated_at' => '2020-03-17 08:19:52',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Jaguar',
                'phone' => '0123456789',
                'email' => 'test@example.com',
                'address' => '1 example , Example , Example',
                'deleted_at' => NULL,
                'created_at' => '2020-03-17 08:19:52',
                'updated_at' => '2020-03-17 08:19:52',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Hugo Boss',
                'phone' => '0123456789',
                'email' => 'test@example.com',
                'address' => '1 example , Example , Example',
                'deleted_at' => NULL,
                'created_at' => '2020-03-17 08:19:52',
                'updated_at' => '2020-03-17 08:19:52',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Bvlgari',
                'phone' => '0123456789',
                'email' => 'test@example.com',
                'address' => '1 example , Example , Example',
                'deleted_at' => NULL,
                'created_at' => '2020-03-17 08:19:52',
                'updated_at' => '2020-03-17 08:19:52',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Azzaro',
                'phone' => '0123456789',
                'email' => 'test@example.com',
                'address' => '1 example , Example , Example',
                'deleted_at' => NULL,
                'created_at' => '2020-03-17 08:19:52',
                'updated_at' => '2020-03-17 08:19:52',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'Mont Blanc',
                'phone' => '0123456789',
                'email' => 'test@example.com',
                'address' => '1 example , Example , Example',
                'deleted_at' => NULL,
                'created_at' => '2020-03-17 08:19:52',
                'updated_at' => '2020-03-17 08:19:52',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'Ferrari',
                'phone' => '0123456789',
                'email' => 'test@example.com',
                'address' => '1 example , Example , Example',
                'deleted_at' => NULL,
                'created_at' => '2020-03-17 08:19:52',
                'updated_at' => '2020-03-17 08:19:52',
            ),
        ));
        
        
    }
}