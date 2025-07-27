<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class SalesRecord extends Model
{
    use HasFactory;

    protected $table = 'sales';
    protected $primaryKey = 'id_sales';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'id_sales',
        'tgl_sales',
        'id_customer',
        'do_number',
        'status'
    ];

    protected $casts = [
        'tgl_sales' => 'datetime',
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

    // Customer relationship
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'id_customer', 'id_customer');
    }

    // Transactions relationship
    public function transactions()
    {
        return $this->hasMany(Transaction::class, 'id_sales', 'id_sales');
    }

    // Calculate total amount
    public function getTotalAmountAttribute()
    {
        return $this->transactions->sum('amount');
    }
}
