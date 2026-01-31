<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Tutor;
use App\Models\Subject;
use App\Models\Grade;


class Request extends Model
{
    protected $fillable = [
        'student_id',
        'tutor_id',
        'subject_id',
        'grade_id',
        'proposed_datetime',
        'notes',
        'status',
        'price',
    ];

public function student(){
    return $this->belongsTo(User::class,'student_id');
}

public function tutor(){
    return $this->belongsTo(Tutor::class,'tutor_id');
}

public function subject(){
    return $this->belongsTo(Subject::class,'subject_id');
}

public function grade(){
    return $this->belongsTo(Grade::class,'grade_id');
}

public function review()
{
    return $this->hasOne(Review::class, 'request_id');
}

}



