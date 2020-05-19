<?php

use Illuminate\Database\Seeder;

class TypeShippingTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('type_shipping')->delete();
        
        \DB::table('type_shipping')->insert(array (
            0 => 
            array (
                'id' => 1,
                'shipping_department_id' => 3,
                'name' => 'AhaMove - Chuyen Phat Nhanh',
                'price' => 20000,
                'day_shipping_count' => 1,
                'deleted_at' => NULL,
                'created_at' => '2020-05-11 09:53:46',
                'updated_at' => '2020-05-11 09:53:46',
            ),
            1 => 
            array (
                'id' => 2,
                'shipping_department_id' => 2,
                'name' => 'Giao Hang Nhanh - Chuyen Phat Nhanh',
                'price' => 18000,
                'day_shipping_count' => 1,
                'deleted_at' => NULL,
                'created_at' => '2020-05-11 10:16:41',
                'updated_at' => '2020-05-11 10:16:41',
            ),
            2 => 
            array (
                'id' => 3,
                'shipping_department_id' => 1,
                'name' => 'Grap - Van Chuyen hang',
                'price' => 15000,
                'day_shipping_count' => 2,
                'deleted_at' => NULL,
                'created_at' => '2020-05-11 10:20:04',
                'updated_at' => '2020-05-11 10:20:04',
            ),
            3 => 
            array (
                'id' => 4,
                'shipping_department_id' => 1,
                'name' => 'Grap - Tien Loi',
                'price' => 12312,
                'day_shipping_count' => 4,
                'deleted_at' => NULL,
                'created_at' => '2020-05-11 10:24:04',
                'updated_at' => '2020-05-11 10:24:04',
            ),
            4 => 
            array (
                'id' => 5,
                'shipping_department_id' => 2,
                'name' => 'Giao Hang Nhanh - Chuyen Hang Nang',
                'price' => 100000,
                'day_shipping_count' => 3,
                'deleted_at' => NULL,
                'created_at' => '2020-05-12 08:01:26',
                'updated_at' => '2020-05-12 08:01:26',
            ),
        ));
        
        
    }
}