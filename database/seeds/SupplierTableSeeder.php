<?php

use Illuminate\Database\Seeder;
use App\Models\Supplier;

class SupplierTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $supplier = new Supplier;
        $supplier->name = 'Supplier 01';
        $supplier->phone = '0123456789';
        $supplier->email = 'test@example.com';
        $supplier->address = '1 example , Example , Example';

        $supplier->save();
    }
}
