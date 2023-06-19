<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TemporaryResidenceAndAbsence extends Model
{
    use HasFactory;

    protected $table = 'temporary_residence_and_absence';

    protected $fillable = [
        'personId',
        'householdId',
        'startDate',
        'endDate',
        'reason',
        'tempAbsenceAddress'
    ];
}
