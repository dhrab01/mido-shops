<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function section()
    {
        return $this->belongsTo('App\Models\Section','section_id');
    }

     public function category()
    {
        return $this->belongsTo('App\Models\Category','category_id');
    }

    public function admin()
    {
        return $this->belongsTo('App\Models\Admin', 'admin_id');
    }

     public function vendorPersonal(){
        return $this->belongsTo('App\Models\Vendor', 'vendor_id');
    }

    public function vendorBusiness(){
        return $this->belongsTo('App\Models\VendorBusinessDetail', 'vendor_id');
    }
    public function vendorBank(){
        return $this->belongsTo('App\Models\VendorsBankDetials', 'vendor_id');
    }
}
