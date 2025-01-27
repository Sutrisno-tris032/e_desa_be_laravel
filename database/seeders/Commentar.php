<?php

namespace Database\Seeders;

use App\Models\Commentar as ModelsCommentar;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Commentar extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        ModelsCommentar::factory(20)->create();
    }
}
