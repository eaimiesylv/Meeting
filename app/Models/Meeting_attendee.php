<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meeting_attendee extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function user(){
        return $this->belongsTo(User::class,'attendee_id','id');
    }
    public function meeting(){
        return $this->belongsTo(Meeting::class,'meeting_id','id');
    }
    public function creator(){
        return $this->belongsTo(User::class,'creator_id','id');
    }
}
