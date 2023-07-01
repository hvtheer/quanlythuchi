<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use App\Models\HouseholdMember;

class NoDuplicatedPersonId implements ValidationRule
{
    private $householdId;

    public function __construct($householdId)
    {
        $this->householdId = $householdId;
    }

    public function validate(string $attribute, $value, Closure $fail): void
    {
        $count = HouseholdMember::where('householdId', $this->householdId)
            ->where('personID', $value)
            ->count();

        if ($count > 0) {
            $fail("A member with the same personID already exists in the household.");
        }
    }
}
