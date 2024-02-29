<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Source extends Model
{
    use HasFactory;

    protected $guarded = [];
    public $timestamps = false;

    protected $casts= [
        'data' => 'array',
    ];

    public function results()
    {
        return $this->hasMany(Result::class);
    }
}
