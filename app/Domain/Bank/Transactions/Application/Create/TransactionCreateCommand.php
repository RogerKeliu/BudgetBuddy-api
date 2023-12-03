<?php

namespace Domain\Bank\Transactions\Application\Create;

use Domain\Shared\Domain\Bus\Command\Command;

final class TransactionCreateCommand implements Command
{
    public function __construct(
        private readonly int $account_id,
        private readonly int $bank_type_id,
        private readonly string $description,
        private readonly string $type,
        private readonly float $amount,
        private readonly string $currency,
        private readonly string $comment,
        private readonly float $available,
        private readonly bool $no_profit,
        private readonly string $creation_date
    )
    {

    }

    public static function create(
        int $account_id,
        int $bank_type_id,
        string $description,
        string $type,
        float $amount,
        string $currency,
        string $comment,
        float $available,
        bool $no_profit,
        string $creation_date
    )
    {
        return new self(
            $account_id,
            $bank_type_id,
            $description,
            $type,
            $amount,
            $currency,
            $comment,
            $available,
            $no_profit,
            $creation_date
        );
    }

    public function toArray(): array
    {
        return get_object_vars($this);
    }


    /*
    |--------------------------------------------------------------------------
    |                                 GETTERS
    |--------------------------------------------------------------------------
    */

    public function getAccountId()
    {
            return $this->account_id;
    }

    public function getBankTypeId()
    {
            return $this->bank_type_id;
    }

    public function getDescription()
    {
            return $this->description;
    }

    public function getType()
    {
            return $this->type;
    }

    public function getAmount()
    {
            return $this->amount;
    }

    public function getCurrency()
    {
            return $this->currency;
    }

    public function getComment()
    {
            return $this->comment;
    }

    public function getAvailable()
    {
            return $this->available;
    }

    public function getNo_profit()
    {
            return $this->no_profit;
    }

    public function getCreationDate()
    {
        return $this->creation_date;
    }
}
