<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscribe extends Model
{
    use HasFactory;
    protected $guarded = ['subscrib_id'];

    public $table = "subscribs";
    protected $dates = ['subscrib_expire_at'];


    public function user()
    {
        return $this->belongsTo(User::class, 'subscrib_user_id');
    }
}
