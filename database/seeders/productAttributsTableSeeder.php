<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ProductAttribute;

class productAttributsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $attributeRecords = [
            ['id'=>1,'product_id'=>2,'size'=>'small','price'=>100,'stock'=>10,'sku'=>'Rc011-s','status'=>1],
            ['id'=>2,'product_id'=>2,'size'=>'mediom','price'=>150,'stock'=>10,'sku'=>'Rc011-md','status'=>1],
            ['id'=>3,'product_id'=>2,'size'=>'large','price'=>200,'stock'=>10,'sku'=>'Rc011-lg','status'=>1],
        ];

        ProductAttribute::insert($attributeRecords);
    }
}
