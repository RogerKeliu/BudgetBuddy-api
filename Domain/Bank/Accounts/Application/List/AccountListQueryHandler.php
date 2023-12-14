<?php

namespace Domain\Bank\Accounts\Application\List;

use Domain\Shared\Domain\Bus\Query\Query;
use Domain\Shared\Domain\Bus\Query\QueryHandler;

class AccountListQueryHandler implements QueryHandler
{
    protected $service;

    public function __construct(AccountListService $service)
    {
        $this->service = $service;
    }

    /**
     * @param AccountListQuery $data
     * @return array
     */
    public function __invoke(AccountListQuery $data): array
    {
        return ($this->service)($data);
    }
}
