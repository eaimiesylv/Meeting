<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function attendee(){
        return $this->hasMany(Meeting_attendee::class,'meeting_id','id');
    }
    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
}
