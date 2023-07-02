<?php

namespace Database\Factories;

use App\Models\TemporaryResidenceAndAbsence;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;
use Faker\Provider\vi_VN\Address as ViAddressProvider;

// ...

class TemporaryResidenceAndAbsenceFactory extends Factory
{
    protected $model = TemporaryResidenceAndAbsence::class;

    public function definition()
    {
        $createdAt = $this->faker->dateTimeBetween('2023-1-1', 'now');
        $startDate = $this->faker->dateTimeBetween($createdAt, '2023-12-31')->format('Y-m-d');
        
        return [
            'personId' => function () {
                return \App\Models\Person::factory()->create()->id;
            },
            'householdId' => null, // Replace with the logic to assign a household ID
            'userId' => function () {
                return \App\Models\User::factory()->create()->id;
            },
            'startDate' => $startDate,
            'endDate' => $this->faker->dateTimeBetween($startDate, '2023-12-31')->format('Y-m-d'),
            'reason' => $this->faker->sentence,
            'type' => $this->faker->randomElement(['residence', 'absence']),
            'beforeAddress' => $this->faker->optional()->address,
            'created_at' => $createdAt->format('Y-m-d H:i:s'), // Properly format date and time
            'updated_at' => $this->faker->dateTimeBetween($createdAt, 'now')->format('Y-m-d H:i:s'), // Properly format date and time
        ];        
    }
}
