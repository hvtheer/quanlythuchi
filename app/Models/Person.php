<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;

    protected $table = 'persons';

    protected $fillable = [
        'idCard',
        'firstName',
        'lastName',
        'dateOfBirth',
        'gender',
        'email',
        'numberPhone',
        'ethnic',
        'nationality',
        'address',
        'occupation',
        'educationLevel',
        'maritalStatus',
        'status',
    ];
}
