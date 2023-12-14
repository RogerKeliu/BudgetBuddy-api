<?php

namespace Domain\Bank\Accounts\Application\Delete;

use Domain\Shared\Domain\Bus\Command\CommandHandler;

class AccountDeleteCommandHandler implements CommandHandler
{
    protected $service;

    public function __construct(AccountDeleteService $service)
    {
        $this->service = $service;
    }

    /**
     * @param AccountListQuery $data
     * @return array
     */
    public function __invoke(AccountDeleteCommand $data)
    {
        ($this->service)($data);
    }
}
