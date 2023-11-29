<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    public function folders()
    {
        return $this->belongsToMany(Folder::class, 'folder_job_clients', 'client_id', 'folder_id');
    }

    public function vendors()
    {
        return $this->belongsToMany(Vendor::class, 'client_vendors');
    }
}
