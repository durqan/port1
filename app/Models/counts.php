<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class counts extends Model
{
    protected $table = 'counts';

    public function survey ()
    {
        return $this->hasOne(surveys::class,'id', 'surveys_id');
    }

    public function answer ()
    {
        return $this->hasOne(answers::class,'id', 'answer_id');
    }
}
