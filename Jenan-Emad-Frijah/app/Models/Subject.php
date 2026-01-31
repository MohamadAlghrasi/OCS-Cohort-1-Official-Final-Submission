<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Tutor;
use App\Models\Request;


class Subject extends Model
{
    use SoftDeletes;

    protected $fillable=['name','description'];

    protected $dates =['deleted_at'];

   public function tutors(){
    return $this->belongsToMany(Tutor::class,'subject_tutor','subject_id','tutor_id')
    ->withPivot('grade','price_per_hour')->withTimestamps();
   }
     public function requests(){
        return $this->hasMany(Request::class ,'subject_id');
            }

  
}
