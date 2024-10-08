<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Candidate extends Model
{
    use HasFactory , SoftDeletes;

    public function vendor()
    {
        return $this->belongsTo(Vendor::class, 'vendor_id');
    }
}
