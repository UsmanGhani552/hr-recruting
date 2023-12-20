<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Submission extends Model
{
    use HasFactory , SoftDeletes;

    public function vendor(){
        return $this->belongsTo(Vendor::class,'vendor_id','id');
    }
    public function client(){
        return $this->belongsTo(Client::class,'client_id','id');
    }
    public function job(){
        return $this->belongsTo(Job::class,'job_id','id');
    }
    public function candidate(){
        return $this->belongsTo(candidate::class,'candidate_id','id');
    }
    public function user(){
        return $this->belongsTo(User::class,'vendor_id','id');
    }
    public function teamMember(){
        return $this->belongsTo(User::class,'team_member_id','id');
    }

}
