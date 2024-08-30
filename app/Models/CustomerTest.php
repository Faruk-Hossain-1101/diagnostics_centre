<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerTest extends Model
{
    use HasFactory;
    protected $fillable = ['customer_id', 'test_id', 'invoice_id', 'price'];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function test()
    {
        return $this->belongsTo(Test::class);
    }

    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }
}
