<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HouseholdMember extends Model
{
    use HasFactory;

    protected $table = 'household_members';

    protected $fillable = [
        'personId',
        'householdId',
        'relationship',
        'isOwner'
    ];

}
