<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'specialty', 'phone', 'email', 'payed_amount', 'unpayed_amount' ];

    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }

    public function discount()
    {
        return $this->hasOne(Discount::class);
    }
}
