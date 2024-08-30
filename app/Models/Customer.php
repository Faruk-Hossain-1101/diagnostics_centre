<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $fillable = ['first_name', 'last_name', 'email', 'phone', 'date_of_birth', 'address'];

    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }

    public function customerTests()
    {
        return $this->hasMany(CustomerTest::class);
    }
    
}
