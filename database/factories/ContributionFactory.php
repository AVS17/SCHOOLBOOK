<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Contribution;

class ContributionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Contribution::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'amount' => $this->faker->numberBetween(-10000, 10000),
            'status' => $this->faker->boolean,
            'description' => $this->faker->text,
            'contribution_date' => $this->faker->date(),
            'deadline_date' => $this->faker->date(),
            'student_id' => $this->faker->word,
        ];
    }
}
