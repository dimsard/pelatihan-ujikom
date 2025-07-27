<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Officer extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_user';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'id_user',
        'nama_user',
        'username',
        'password',
        'level'
    ];

    protected $hidden = ['password'];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            if (empty($model->{$model->getKeyName()})) {
                $model->{$model->getKeyName()} = (string) Str::uuid();
            }
        });
    }

    // Polymorphic relationship
    public function user()
    {
        return $this->morphOne(User::class, 'userable', 'userable_type', 'userable_id', 'id_user');
    }
}
