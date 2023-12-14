<?php

namespace App\Http\Controllers\Bank\Account;

use App\Http\Controllers\Controller;
use Domain\Bank\Accounts\Application\Create\AccountCreateCommand;
use Domain\Bank\Accounts\Application\List\AccountListQuery;
use Domain\Shared\Infrastructure\Bus\Command\CommandBus;
use Domain\Shared\Infrastructure\Bus\Query\QueryBus;
use Illuminate\Http\Request;

class CreateController extends Controller
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
        $this->commandBus->dispatch(AccountCreateCommand::create(
            $request->input('owner_id'),
            $request->input('label'),
            $request->input('iban')
        ));

        return 200;
    }
}
