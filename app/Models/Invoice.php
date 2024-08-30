<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    protected $fillable = ['customer_id', 'doctor_id', 'total_amount', 'discount_amount', 'net_amount'];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    public function customerTests()
    {
        return $this->hasMany(CustomerTest::class);
    }
}
