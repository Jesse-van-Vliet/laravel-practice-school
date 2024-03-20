<?php

namespace Database\Factories;

use App\Models\Activity;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Task;
use App\Models\Project;
use App\Models\Product;



class ActivityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Activity>
     */
    public function definition(): array
    {

        return [
            "name" => $this->faker->word(),
        ];
    }
}
