<?php

namespace App\Http\Controllers\Bank\Account;

use App\Http\Controllers\Controller;
use Domain\Bank\Accounts\Application\Create\AccountCreateCommand;
use Domain\Bank\Accounts\Application\Delete\AccountDeleteCommand;
use Domain\Bank\Accounts\Application\List\AccountListQuery;
use Domain\Shared\Infrastructure\Bus\Command\CommandBus;
use Domain\Shared\Infrastructure\Bus\Query\QueryBus;
use Illuminate\Http\Request;

class DeleteByArrayController extends Controller
{
    protected $commandBus;

    public function __construct(CommandBus $commandBus)
    {
        $this->commandBus = $commandBus;
    }

    /**
     *
     * @param Request $request
     * @return void
     */
    public function __invoke(Request $request)
    {
        
        $this->commandBus->dispatch(AccountDeleteCommand::create($request->get('ids')));

        return 200;
    }
}
