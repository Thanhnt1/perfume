<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(UnitTableSeeder::class);
        $this->call(SuppliersTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(PropertiesTableSeeder::class);

        $this->call(ShippingDepartmentTableSeeder::class);
        $this->call(TypeShippingTableSeeder::class);
    }
}
