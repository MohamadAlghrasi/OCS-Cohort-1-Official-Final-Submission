<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Tutor;


class Payment extends Model
{

protected $fillable = [
'student_id',
'tutor_id',
'amount',
'payment_method',
'status',
'transaction_id',
'paypal_order_id',
    ];

public function tutor(){
    return $this->belongsTo(Tutor::class,'tutor_id');
}
public function student(){
    return $this->belongsTo(User::class,'student_id');
}


}
