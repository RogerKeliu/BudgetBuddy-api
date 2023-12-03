<?php

namespace Domain\Bank\Accounts\Infrastructure\Eloquent;

use Illuminate\Database\Eloquent\Model;
use Database\Factories\Bank\AccountFactory;
use Domain\Bank\Transactions\Infrastructure\Eloquent\Transaction;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Account extends Model
{
    use HasFactory; use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'owner_id',
        'label',
        'iban',
        'amount'
    ];

    /**
     * The attributes that should be cast.
     */
    protected $casts = [
        'owner_id' => 'int',
        'label' => 'string',
        'iban' => 'string',
        'amount' => 'float',
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s'
    ];

    /**
     * Create a new factory instance for the model.
     */
    protected static function newFactory()
    {
        return AccountFactory::new();
    }

    public function transactions(): HasMany
    {
        return $this->hasMany(Transaction::class);
    }
}
