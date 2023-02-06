<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminRecords = [
            ['id'=> 2, 'name'=>'saeed', 'type'=>'vendor', 'vendor_id'=>1, 'mobile'=>'777221955', 'email'=>'saeedga@gmail.com'
            ,'password'=>'$2a$12$mNirZUS8u3SSXpA4cR3RUet3TYfqoz32kuvVoMKrVS.qcxlCJNUre', 'image'=>'','status'=>1]
        ];
        Admin::insert($adminRecords);
    }
}
