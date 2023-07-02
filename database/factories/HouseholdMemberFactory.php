<?php

namespace Database\Factories;

use App\Models\HouseholdMember;
use Illuminate\Database\Eloquent\Factories\Factory;

class HouseholdMemberFactory extends Factory
{
    protected $model = HouseholdMember::class;

    public function definition()
    {
        $relationship = $this->faker->randomElement(['Bố', 'Mẹ', 'Con trai', 'Con gái']);
        $isOwner = $this->faker->boolean;
        $householdId = \App\Models\Household::factory()->create()->id;

        return [
            'personId' => function () {
                return \App\Models\Person::factory()->create()->id;
            },
            'householdId' => $householdId,
            'relationship' => $relationship,
            'isOwner' => $isOwner ? $householdId : false,
        ];
    }
}
