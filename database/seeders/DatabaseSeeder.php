<?php

namespace Database\Seeders;

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
        // \App\Models\User::factory(10)->create();
        //  $this->call(AdminsTableSeeder::class);
        //  $this->call(VendorsTableSeeder::class);

        // $this::call(VendorsBusinessDetailsSeeder::class);
       //$this::call(SectionsTableSeeder::class);
       //$this::call(CategoryTableSeeder::class);
     //$this::call(BrandsTableSeeder::class);
    //$this::call(ProductsTableSeeder::class);
    // $this::call(productAttributsTableSeeder::class);
        $this::call(BannerTableSeeder::class);
    }
}
