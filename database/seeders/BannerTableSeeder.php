<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Banner;

class BannerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bannerRecord = [
            ['id'=>1,'image'=>'16.jpg','link'=>'save-50%','title'=>'SAVE 50%','alt'=>'FOR FIRST PURCHASE','class'=>'<div class="shop-hero-slider-animated shop-hero-slider-delay-1 display-1font-weight-semibold mb-2">{{$banner["title"]}}</div><div class="shop-hero-slider-animated shop-hero-slider-delay-2 display-4">{{$banner["alt"]}}</div>','status'=>1],

            ['id'=>2,'image'=>'28.png','link'=>'SUITS-COLLECTION','title'=>'EXCLUSIVE','alt'=>'SUITS COLLECTION','class'=>'<div class="shop-hero-slider-animated shop-hero-slider-delay-1 display-4 text-white text-expanded mb-4">{{$banner["title"]}}</div>
                         <div class="shop-hero-slider-animated shop-hero-slider-delay-2 display-3 bg-white text-center text-body font-weight-bold text-expanded py-1 px-3 mx-auto">{{$banner["alt"]}} </div>','status'=>1],
        ];
        Banner::insert($bannerRecord);
    }
}
