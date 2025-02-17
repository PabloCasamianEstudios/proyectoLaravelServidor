<?php

namespace Database\Seeders;

use App\Models\miembro;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MiembroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Miembro::factory()->count(50)->create();
    }
}
