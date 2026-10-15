<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Student extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'date_of_birth',
    ];

    protected function casts(): array
    {
        return [
            'date_of_birth' => 'date',
        ];
    }

    protected function age(): Attribute
    {
        return Attribute::get(function () {
            if (!$this->date_of_birth) {
                return null;
            }

            return $this->date_of_birth->age;
        });
    }
}
