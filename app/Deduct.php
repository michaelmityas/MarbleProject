<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deduct extends Model
{
    public function employees(){
        return $this->belongsTo("App\Employee");
    }
}
