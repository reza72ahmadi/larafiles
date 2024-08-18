<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;
    protected $table = 'files';
    protected $primarykey  = 'file_id';

    protected $fillable = [
        'file_title',
        'file_description',
        'file_type',
        'file_size',
        'file_name',
    ];
    public function packages()
    {
        return $this->belongsToMany(Package::class, 'file_package', 'file_id', 'package_id');
    }

    public function categories()
    {
        return $this->morphToMany(Category::class, 'categorizables');
    }
    
    public function getFileTypeTextAttribute()
    {
        $types = [
            'application/pdf' => 'PDF',
            'image/png' => 'PNG', // Corrected here
        ];
        return $types[$this->attributes['file_type']] ?? 'Unknown type';
    }
}
