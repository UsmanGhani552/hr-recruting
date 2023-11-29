<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

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
}
