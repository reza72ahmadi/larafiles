<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';
    protected $fillable = [
        'category_name'
    ];


    protected $primaryKey = 'id';

    public $timestamps = false;

    public function packages()
    {
        return $this->morphedByMany(Package::class, 'categorizable');
    }

    public function files()
    {
        return $this->morphedByMany(File::class, 'categorizable');

    }
}
