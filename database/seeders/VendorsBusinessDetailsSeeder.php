<?php

namespace Database\Seeders;
use App\Models\VendorsBusinissDetail;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VendorsBusinessDetailsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $vendorRecords = [
            ['id'=>1, 'vendor_id'=>1, 'shop_name'=>'madredo', 'shop_address'=>'50_street',
            'shop_city'=>'sanaa', 'shop_state'=>'alamanah', 'shop_country'=>'yemen', 'shop_pincode'=>'00967',
            'shop_mobile'=>'777755683', 'shop_website'=>'madredo.com', 'shop_email'=>'shop@madredo.com',
            'address_proof'=>'passport', 'address_proof_image'=>'', 'business_license_number'=>'006678952221', 'gst_number'=>'02254103160','pan_number'=>'7785241002336'],
        ];
        DB::table('vendor_business_detail')->insert($vendorRecords);
    }
}
