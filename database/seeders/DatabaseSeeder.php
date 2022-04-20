<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Database\Seeders\ContextSeeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(ContextSeeder::class);
    }
}
