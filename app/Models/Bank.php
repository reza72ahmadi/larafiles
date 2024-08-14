<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'amount'
    ];

    public function transactions()
    {
        return $this->hasMany(Transaction::class,'bank_id','id');
    }
}
