<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    protected $fillable = [
        'name',
    ]; 

    public function requests(){
    return $this->hasMany(Request::class, 'grade_id');
}

}
