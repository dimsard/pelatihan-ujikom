<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Customer extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_customer';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'id_customer',
        'nama_customer',
        'alamat',
        'telp',
        'fax',
        'email'
    ];

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
        return $this->morphOne(User::class, 'userable', 'userable_type', 'userable_id', 'id_customer');
    }

    // Sales relationship
    public function salesRecords()
    {
        return $this->hasMany(SalesRecord::class, 'id_customer', 'id_customer');
    }
}
