<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Tutor;
use App\Models\User;

class Review extends Model
{

protected $fillable = [
    'tutor_id',
    'student_id',
    'request_id',
    'rating',
    'feedback',
];

    public function tutor(){
        return $this-> belongsTo(Tutor::class,'tutor_id');
    }

     public function student(){
        return $this-> belongsTo(User::class,'student_id');
    }


   public function request()
    {
        return $this->belongsTo(Request::class, 'request_id');
    }
}
