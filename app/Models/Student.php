<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'lastname',
        'document_type',
        'document_number',
        'gender',
        'birthdate',
        'career'
    ];

    protected $casts = [
        'birthdate' => 'date:Y-m-d',
    ];
    public function setBirthdateAttribute($value) {
        $this->attributes['birthdate'] = date('Y-m-d', strtotime($value) );
    }
}
