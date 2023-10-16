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
        $item->deleted_at = "2023/9/22";

        $item->save();
        $item = new Category();
        $item->name = "Điện thoại";
        $item->deleted_at = "2023/9/22";

        $item->save();
    }
}
