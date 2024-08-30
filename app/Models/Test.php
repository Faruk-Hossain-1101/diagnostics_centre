<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'group_id', 'price'];

    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    public function customerTests()
    {
        return $this->hasMany(CustomerTest::class);
    }
}
