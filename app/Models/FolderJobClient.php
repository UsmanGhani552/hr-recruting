<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FolderJobClient extends Model
{
    use HasFactory;
    protected $fillable = ['category', 'folder_id', 'client_id', 'job_id'];

    public function folder()
    {
        return $this->belongsTo(Folder::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function job()
    {
        return $this->belongsTo(Job::class);
    }
}
