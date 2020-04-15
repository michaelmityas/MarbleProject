<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    public function deducts(){
        return $this->hasMany("App\Deduct");
    }

    public function attend(){
        return $this->hasMany("App\Attendance");
    }
}
