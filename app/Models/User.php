<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
        'userable_type',
        'userable_id'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    // Polymorphic relationship
    public function userable()
    {
        return $this->morphTo();
    }

    // Helper methods to check user type
    public function isCustomer()
    {
        return $this->userable_type === Customer::class;
    }

    public function isSales()
    {
        return $this->userable_type === Sales::class;
    }

    public function isOfficer()
    {
        return $this->userable_type === Officer::class;
    }
}
