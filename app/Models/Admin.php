<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatble;

class Admin extends Authenticatble
{
    use HasFactory;
    protected $guard = 'admin';
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
