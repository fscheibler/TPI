<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


use App\Models\Project; //rajouté

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    protected $model = Project::class; //rajouté
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word
        ];
    }
}
