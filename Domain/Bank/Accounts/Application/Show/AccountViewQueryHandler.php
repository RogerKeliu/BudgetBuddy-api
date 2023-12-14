<?php

namespace Domain\Bank\Accounts\Application\Show;

use Domain\Shared\Domain\Bus\Query\Query;
use Domain\Shared\Domain\Bus\Query\QueryHandler;

class AccountViewQueryHandler implements QueryHandler
{
    protected $service;

    public function __construct(AccountViewService $service)
    {
        $this->service = $service;
    }

    /**
     * @param AccountListQuery $data
     * @return array
     */
    public function __invoke(AccountViewQuery $data): array
    {
        return ($this->service)($data);
    }
}
