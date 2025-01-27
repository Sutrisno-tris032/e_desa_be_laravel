<?php

namespace Database\Seeders;

use App\Models\NewsCategory as ModelsNewsCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NewsCategory extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        ModelsNewsCategory::factory(20)->create();
    }
}
