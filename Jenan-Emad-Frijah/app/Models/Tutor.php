<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;
use App\Models\Subject;
use App\Models\Request;



class Tutor extends Model
{
    use SoftDeletes;

    protected $table='tutors';

  protected $fillable = [
    'user_id',
    'name',
    'email',
    'phone',
    'location',
    'bio',
    ];
    protected $dates = ['deleted_at'];

   public function user() {
    return $this->belongsTo(User::class)->whereNull('deleted_at');
}

  public function subjects(){
    return $this->belongsToMany(Subject::class, 'subject_tutor', 'tutor_id', 'subject_id')
                ->withPivot('grade', 'price_per_hour')
                ->withTimestamps();
}

  public function requests(){
        return $this->hasMany(Request::class,'tutor_id');
            }

    public function reviews(){
        return $this->hasMany(Review::class,'tutor_id');
            }

}
