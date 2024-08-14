<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Psy\CodeCleaner\ReturnTypePass;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'user';
    protected $primaryKey = 'id';

    protected $fillable = [
        'full_name',
        'email',
        'password',
        'role',
        'wallet',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];



    public function payments(): HasMany
    {
        return $this->hasMany(Payment::class, 'payment_user_id');
    }


    public function subscribes(): HasMany
    {
        return $this->hasMany(Subscribe::class, 'subscrib_user_id');
    }


    public function packages()
    {
        return $this->belongsToMany(Package::class, 'user_packages', 'user_id', 'package_id')->withPivot('amount', 'created_at');
    }


}
