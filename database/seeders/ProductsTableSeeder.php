<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $productRecords = [
            ['id'=>1,'section_id'=>3,'category_id'=>5,'brand_id'=>7,
            'vendor_id'=>0,'admin_id'=>1,'admin_type'=>'vendor','product_name'=>'RN11',
            'product_code'=>'Rn1112','product_color'=>'red,blue,silver','product_price'=>500,'product_discount'=>0.00,
            'product_unit'=>'100','product_weight'=>'','product_image'=>'','product_video'=>'','discription'=>'',
            'meta_title'=>'','meta_discription'=>'','meta_keywords'=>'','is_featured'=>'Yes','status'=>1],


            ['id'=>2,'section_id'=>2,'category_id'=>6,'brand_id'=>2,
            'vendor_id'=>1,'admin_id'=>2,'admin_type'=>'admin','product_name'=>'Red Casual T-shirt',
            'product_code'=>'Rc011','product_color'=>'red','product_price'=>80,'product_discount'=>0.00,
            'product_unit'=>'50','product_weight'=>'','product_image'=>'','product_video'=>'','discription'=>'',
            'meta_title'=>'','meta_discription'=>'','meta_keywords'=>'','is_featured'=>'Yes','status'=>1],

            
        ];
        Product::insert($productRecords);
    }
}
