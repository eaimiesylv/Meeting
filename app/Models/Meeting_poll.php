<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meeting_poll extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function meeting(){
        return $this->belongsTo(Meeting::class,'meeting_id','id');
    }
    public function poll_questions(){
        return $this->hasMany(Poll_question::class,'meeting_poll_id','id');
    }
    public function poll_count(){
        return $this->hasMany(Meeting_poll_count::class,'poll_question_id','id');
    }
}
