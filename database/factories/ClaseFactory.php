<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Clase;

class ClaseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Clase::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'subject_id' => $this->faker->word,
            'classroom_id' => $this->faker->word,
            'history_id' => $this->faker->word,
            'cycle_id' => $this->faker->word,
        ];
    }
}
