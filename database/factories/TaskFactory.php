<?php

namespace Database\Factories;

use App\Models\Activity;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\seeder;
use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Carbon\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     * @throws \Exception
     */
    public function definition(): array
    {
        return [
            "task" => $this->faker->word(),
            "begindate" => Carbon::today()->subDays(random_int(0, 365)),
            "enddate" => Carbon::today()->subDays(random_int(0, 365)),
            "user_id" => User::all()->random()->id,
            "project_id" => Project::all()->random()->id,
            "activity_id" => Activity::all()->random()->id,
        ];
    }
}
