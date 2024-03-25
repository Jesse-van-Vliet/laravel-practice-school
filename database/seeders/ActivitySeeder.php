<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Activity;

class ActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
//         Activity::factory()->times(25)->create();

        Activity::factory()->create([
            'name' => 'Todo',
        ]);

        Activity::factory()->create([
            'name' => 'Doing',
        ]);

        Activity::factory()->create([
            'name' => 'Testing',
        ]);
        Activity::factory()->create([
            'name' => 'Verify',
        ]);
        Activity::factory()->create([
            'name' => 'Done',
        ]);
    }
}
