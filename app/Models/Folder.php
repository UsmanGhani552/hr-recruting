<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Folder extends Model
{
    use HasFactory;

    protected $table = 'folders';
    protected $fillable = [
        'title',
        'category'
    ];

    // Define the one-to-many relationship with the pivot table
    public function folderItems()
    {
        return $this->hasMany(FolderJobClient::class);
    }

    // Define a many-to-many relationship with the Job model
    public function jobs()
    {
        return $this->belongsToMany(Job::class, 'folder_job_clients', 'folder_id', 'job_id');
    }

    // Define a many-to-many relationship with the Client model
    public function clients()
    {
        return $this->belongsToMany(Client::class, 'folder_job_clients', 'folder_id', 'client_id');
    }
}
