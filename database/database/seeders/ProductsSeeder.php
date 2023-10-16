<?php

namespace Database\Seeders;

use App\Models\product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $table->id();
        //     $table->string('name');
        //     $table->string('slug');
        //     $table->double('price');
        //     $table->longText('decscription');
        //     $table->integer('quantity');
        //     $table->integer('status');
        //     $table->foreignId('category_id')->constrained('categories');
        //     $table->timestamps();
        //     $table->timestamp('deleted_at');
        //     $table->string('image');
        $item = new product();
        $item->name = "Máy tính";
        $item->slug = "nghia";
        $item->price = 23;
        $item->deleted_at = "2023/9/22";
    }
}
