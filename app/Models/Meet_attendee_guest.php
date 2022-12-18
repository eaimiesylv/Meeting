<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meet_attendee_guest extends Model
{
    use HasFactory;
    protected $hidden=['created_at','updated_at'];
    protected $guarded=[];
    public function meeting(){
        return $this->belongsTo(Meeting::class,'meeting_id','id');
    }
}
