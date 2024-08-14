<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class File extends Model
{
    use HasFactory;

    protected $fillable = [
        'file_title',
        'file_description',
        'file_type',
        'file_size',
        'file_name',
    ];
    public function packages()
   {
    return $this->belongsToMany(Package::class, 'file_package','file_id', 'package_id');

   }

   public function categories()
   {
       return $this->morphToMany(Category::class, 'categorizables');
   }
}
