<?php

namespace App;

class Pushup extends Model
{
    protected $dates = ['datetime'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
