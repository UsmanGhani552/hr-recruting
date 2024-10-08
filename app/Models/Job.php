<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Job extends Model
{
    use HasFactory , SoftDeletes;

    public function folders()
    {
        return $this->belongsToMany(Folder::class, 'folder_job_clients', 'job_id', 'folder_id');
    }

    public function vendors()
    {
        return $this->belongsToMany(Vendor::class, 'vendor_jobs');
    }

    public function clients(){
        return $this->belongsTo(Client::class, 'client_id','id');
    }
    public function teamMembers()
    {
        return $this->belongsToMany(User::class, 'vendor_tm_jobs', 'job_id', 'team_member_id');
    }
}
