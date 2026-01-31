<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Request;
use Illuminate\Database\Eloquent\SoftDeletes;


   


class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
   protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'phone',
        'location',
        'profile_image',
    ];
    
    
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
   protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
   protected $casts = [
    'email_verified_at' => 'datetime',
    'password' => 'hashed',
];


    public function tutor(){
        return $this->hasOne(Tutor::class);
    }

    public function requests(){
        return $this->hasMany(Request::class,'student_id');
            }

        public function reviews(){
        return $this->hasMany(Review::class,'student_id');
            }
}
