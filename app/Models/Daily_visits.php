<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Daily_visits extends Model
{
    
    protected $guarded = [];

    public function visited()
    {
        return $this->morphTo();
    }

}
