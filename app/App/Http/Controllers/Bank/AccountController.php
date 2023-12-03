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
use Domain\Shared\Infrastructure\Bus\Query\QueryBus;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    protected $queryBus;

    public function __construct()
    {
        $this->queryBus = new QueryBus;
    }

    /**
     *
     * @param Request $request
     * @return void
     */
    public function index(Request $request)
    {
        $a =  $this->queryBus->ask(AccountListQuery::create());
        return $a;
    }

    public function store(Request $request)
    {
        return (new AccountCreateService((new AccountRepositoryEloquent())))(
            AccountCreateCommand::create(
                $request->input('owner_id'),
                $request->input('label'),
                $request->input('iban')
            )
        );
    }

    public function show(Request $request, int $id)
    {
        return (new AccountViewService((new AccountRepositoryEloquent())))(
            AccountViewQuery::create($id)
        );
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

    public function deleteByArray(Request $request)
    {
        return response()->json(['panda', $request->all()], 200);
        var_dump('panda', $id);
        var_dump($request->all());die;
        return (new AccountDeleteService((new AccountRepositoryEloquent())))(
            AccountDeleteCommand::create($id)
        );
    }

    public function destroy(Request $request, int $id)
    {
        return response()->json($id, 200);
        var_dump('panda');die;
        return (new AccountDestroyService((new AccountRepositoryEloquent())))(
            AccountDestroyCommand::create($id)
        );
    }

    public function importTransactions(Request $request)
    {

    }
}
