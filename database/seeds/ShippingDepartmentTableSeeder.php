<?php

use Illuminate\Database\Seeder;

class ShippingDepartmentTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('shipping_department')->delete();
        
        \DB::table('shipping_department')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Grap',
                'phone' => '123123123',
                'email' => 'grap@example.com',
                'deleted_at' => NULL,
                'created_at' => '2020-05-11 08:12:17',
                'updated_at' => '2020-05-11 08:16:20',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Giao Hang Nhanh',
                'phone' => '01672096333',
                'email' => 'giaohangnhanh@example.com',
                'deleted_at' => NULL,
                'created_at' => '2020-05-11 08:13:55',
                'updated_at' => '2020-05-11 08:16:31',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'AhaMove',
                'phone' => '0123456789',
                'email' => 'ahamove@example.com',
                'deleted_at' => NULL,
                'created_at' => '2020-05-19 08:41:12',
                'updated_at' => '2020-05-19 08:41:12',
            ),
        ));
        
        
    }
}