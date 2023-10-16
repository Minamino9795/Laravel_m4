<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $item = new Category();
        $item->name = "Máy tính";
        $item->decscription = "hay";

        $item->save();
        $item = new Category();
        $item->name = "Điện thoại";
        $item->decscription = "dở";

        $item->save();
    }
}
