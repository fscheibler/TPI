<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public function results()
    {
        return $this->hasMany(Result::class);
    }
}
