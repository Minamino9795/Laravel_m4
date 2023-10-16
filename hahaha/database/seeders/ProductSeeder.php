<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $item = new Product();
        $item->name = "Máy tính";
        $item->image = "hay";
        $item->decscription = "hay";
        $item->price = 3;
        $item->quantity = 2;
        $item->status = 0;
        $item->category_id = 1;

        $item->save();
       ;
    }
}
