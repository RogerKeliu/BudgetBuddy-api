<?php

namespace Domain\Bank\Transactions\Infrastructure\Eloquent;

use Illuminate\Database\Eloquent\Model;
use Database\Factories\Bank\TransactionFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends Model
{
    use HasFactory; use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'account_id',
        'bank_type_id',
        'description',
        'type',
        'amount',
        'currency',
        'comment',
        'available',
        'no_profit',
        'creation_date',
        'value_date'
    ];

    /**
     * The attributes that should be cast.
     */
    protected $casts = [
        'account_id' => 'int',
        'bank_type_id' => 'int',

        'creation_date' => 'datetime:Y-m-d H:i:s',
        'value_date' => 'datetime:Y-m-d H:i:s',
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s'
    ];

    /**
     * Create a new factory instance for the model.
     */
    protected static function newFactory()
    {
        return TransactionFactory::new();
    }
}
