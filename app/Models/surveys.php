<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class surveys extends Model
{

    protected $table = 'surveys';

    public function answers ()
    {
        return $this->hasMany(answers::class, 'surveys_id', 'id');
    }
}
