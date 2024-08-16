<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscribe extends Model
{
    use HasFactory;
    protected $guarded = ['subscrib_id'];
    public $timestamps = false;
    protected $date = [
        'subscrib_created_at',
        'subscrib_expire_at',
    ];

    public $table = "subscribs";
    protected $dates = ['subscrib_expire_at'];


    public function user()
    {
        return $this->belongsTo(User::class, 'subscrib_user_id');
    }
}
