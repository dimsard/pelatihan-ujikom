<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Transaction extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_transaction';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'id_transaction',
        'id_sales',
        'id_item',
        'quantity',
        'price',
        'amount'
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'amount' => 'decimal:2',
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            if (empty($model->{$model->getKeyName()})) {
                $model->{$model->getKeyName()} = (string) Str::uuid();
            }
        });

        // Auto calculate amount when creating/updating
        static::saving(function ($model) {
            $model->amount = $model->quantity * $model->price;
        });
    }

    // Sales relationship
    public function salesRecord()
    {
        return $this->belongsTo(SalesRecord::class, 'id_sales', 'id_sales');
    }

    // Item relationship
    public function item()
    {
        return $this->belongsTo(Item::class, 'id_item', 'id_item');
    }
}
