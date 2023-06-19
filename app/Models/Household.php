<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Household extends Model
{
    use HasFactory;

    protected $table = 'households';

    protected $fillable = [
        'address'
    ];

    public function householdMembers()
    {
        return $this->hasMany(HouseholdMember::class, 'householdId', 'id');
    }
}
