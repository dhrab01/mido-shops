<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Brand;

class BrandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $brandRecord = [
            ['id'=>1,'brand_name'=>'Arrow','brand_image'=>'','status'=>1],
            ['id'=>2,'brand_name'=>'Gap','brand_image'=>'','status'=>1],
            ['id'=>3,'brand_name'=>'Lee','brand_image'=>'','status'=>1],
            ['id'=>4,'brand_name'=>'Samsung','brand_image'=>'','status'=>1],
            ['id'=>5,'brand_name'=>'LG','brand_image'=>'','status'=>1],
            ['id'=>6,'brand_name'=>'Lenovo','brand_image'=>'','status'=>1],
            ['id'=>7,'brand_name'=>'Dell','brand_image'=>'','status'=>1],
            
        ];
        Brand::insert($brandRecord);
    }
}
