<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    protected $primaryKey = 'package_id';
    protected $guarded = ['package_id'];

    public function files()
    {
        return $this->belongsToMany(File::class, 'file_package', 'package_id', 'file_id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_packages', 'package_id', 'user_id')->withPivot('amount', 'created_at');
    }

    public function categories()
    {
        return $this->morphToMany(Category::class, 'categorizable');
    }
}
