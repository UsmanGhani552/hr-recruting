<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use HasFactory, SoftDeletes;

    public function folders()
    {
        return $this->belongsToMany(Folder::class, 'folder_job_clients', 'client_id', 'folder_id');
    }

    public function vendors()
    {
        return $this->belongsToMany(Vendor::class, 'client_vendors');
    }
    
    public function teamMembers()
    {
        return $this->belongsToMany(User::class, 'vendor_tm_clients', 'client_id', 'team_member_id');
    }
}
