<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vendor extends Model
{
    use HasFactory , SoftDeletes;
    protected $table = 'vendors';

    protected $fillable = [
        'first_name',
        'last_name',
        'company_name',
        'home',
        'phone',
        'password',
        'status',
        'state_id',
        'city_id'
    ];

    public function jobs()
    {
        return $this->belongsToMany(Job::class, 'vendor_jobs');
    }

    public function clients()
    {
        return $this->belongsToMany(Client::class, 'client_vendors');
    }

}
