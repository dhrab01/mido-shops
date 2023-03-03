<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Vendor;

class VendorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $vendorRecords =[
        // ['id'=>1,'address'=>'hadah_st',
        //     'city'=>'sanaa','state'=>'alamanah','country'=>'yemen','pincode'=>'110001',
        //     'status'=>0],

            ['id'=>2,'address'=>'hadah_st',
            'city'=>'sanaa','state'=>'alamanah','country'=>'yemen','pincode'=>'110001',
            'status'=>0],
       ];
       Vendor::insert($vendorRecords);
    }
}
