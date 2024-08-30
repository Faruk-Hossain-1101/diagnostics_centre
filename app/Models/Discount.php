<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    use HasFactory;
    protected $fillable = ['doctor_id', 'discount_percentage'];

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
}
