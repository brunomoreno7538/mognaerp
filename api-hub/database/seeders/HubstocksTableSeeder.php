<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class HubstocksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Hubsku::factory()->count(30)->create();
        \App\Models\Hubstock::factory()->count(30)->create();
    }
}
