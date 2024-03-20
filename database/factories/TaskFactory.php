<?php

namespace Database\Factories;

use App\Models\Activity;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\seeder;
use App\Models\Project;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "task" => $this->faker->word(),
            "begindate" => $this->faker->date(),
            "project_id" => Project::all()->random()->id,
            "activity_id" => Activity::all()->random()->id,
        ];
    }
}
