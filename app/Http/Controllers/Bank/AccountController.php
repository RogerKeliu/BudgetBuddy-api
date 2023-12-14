<?php

namespace App\Http\Controllers\Bank;

use App\Http\Controllers\Controller;
use Domain\Bank\Accounts\Application\List\AccountListQuery;
use Domain\Bank\Accounts\Application\List\AccountListService;
use Domain\Bank\Accounts\Application\Create\AccountCreateCommand;
use Domain\Bank\Accounts\Application\Create\AccountCreateService;
use Domain\Bank\Accounts\Application\Delete\AccountDeleteService;
use Domain\Bank\Accounts\Application\Delete\AccountDeleteCommand;
use Domain\Bank\Accounts\Application\Destroy\AccountDestroyCommand;
use Domain\Bank\Accounts\Application\Destroy\AccountDestroyService;
use Domain\Bank\Accounts\Application\Show\AccountViewQuery;
use Domain\Bank\Accounts\Application\Show\AccountViewService;
use Domain\Bank\Accounts\Application\Update\AccountUpdateCommand;
use Domain\Bank\Accounts\Application\Update\AccountUpdateService;
use Domain\Bank\Accounts\Infrastructure\AccountRepositoryEloquent;
use Domain\Shared\Domain\Bus\Query\Response;
use Domain\Shared\Infrastructure\Bus\Command\CommandBus;
use Domain\Shared\Infrastructure\Bus\Query\QueryBus;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    protected $queryBus;

    protected $commandBus;

    public function __construct(QueryBus $queryBus, CommandBus $commandBus)
    {
        $this->queryBus = $queryBus;
        $this->commandBus = $commandBus;
    }

    public function update(Request $request, int $id)
    {
        return (new AccountUpdateService((new AccountRepositoryEloquent())))(
            AccountUpdateCommand::create(
                $id,
                $request->input('owner_id'),
                $request->input('label'),
                $request->input('iban')
            )
        );
    }
    public function destroy(Request $request, int $id)
    {
        return response()->json($id, 200);
        var_dump('panda');
        die;
        return (new AccountDestroyService((new AccountRepositoryEloquent())))(
            AccountDestroyCommand::create($id)
        );
    }

    public function importTransactions(Request $request)
    {

                // $this->commandBus->dispatch(AccountDeleteCommand::create($request->get('ids')));

                var_dump($request->file('files'));die;
        $file_handle = fopen($request->file('files'), 'r');
        while ($csvRow = fgetcsv($file_handle, null)) {
            $line_of_text[] = $csvRow;
        }
        fclose($file_handle);
        dd($line_of_text);
        return $line_of_text;
    }
}
