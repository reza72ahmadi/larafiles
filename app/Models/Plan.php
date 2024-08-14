<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;

    protected $table = 'plan';
    protected $primaryKey = 'plan_id';
    public $timestamps = false;
    
        protected $fillable = [
        'plan_title',
        'plan_limit_download_count',
        'plan_price',
        'plan_days_count',
    ];
     

}
