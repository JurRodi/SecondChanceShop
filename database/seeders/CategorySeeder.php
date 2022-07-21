<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = new \App\Models\Category();
        $category->name = 'Music';
        $category->save();

        $category = new \App\Models\Category();
        $category->name = 'Gaming';
        $category->save();

        $category = new \App\Models\Category();
        $category->name = 'Cars';
        $category->save();

        $category = new \App\Models\Category();
        $category->name = 'ICT';
        $category->save();

        $category = new \App\Models\Category();
        $category->name = 'Toys';
        $category->save();

        $category = new \App\Models\Category();
        $category->name = 'Clothing';
        $category->save();
    }
}
