<?php

namespace Domain\Bank\Accounts\Application\Create;

use Domain\Shared\Domain\Bus\Command\CommandHandler;

class AccountCreateCommandHandler implements CommandHandler
{
    protected $service;

    public function __construct(AccountCreateService $service)
    {
        $this->service = $service;
    }

    /**
     * @param AccountListQuery $data
     * @return array
     */
    public function __invoke(AccountCreateCommand $data)
    {
        ($this->service)($data);
    }
}
