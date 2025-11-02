<?php

namespace Modules\Expenses\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Expense extends Model
{

    protected $keyType = 'string';
    public $incrementing = false;
    
    protected $fillable = [
        'title',
        'amount',
        'category',
        'expense_date',
        'notes',
    ];

    protected $casts = [
        'expense_date' => 'date',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (!$model->id) $model->id = (string) Str::uuid();
        });
    }
}
