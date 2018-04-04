<?php

namespace App;

class Pushup extends Model
{
    

    public function scopeWeakSets($query)
    {
        return $query->where('amount', '>', 40);
    }
}
