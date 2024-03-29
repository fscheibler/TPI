<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Project extends Model
{
    use HasFactory;
    public $timestamps = false;


    protected $casts = [
        'data' => 'array',
    ];

    protected $guarded = [];

    public function results()
    {
        return $this->hasMany(Result::class);
    }
}
