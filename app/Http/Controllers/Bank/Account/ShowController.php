<?php

namespace App\Http\Controllers\Bank\Account;

use App\Http\Controllers\Controller;
use Domain\Bank\Accounts\Application\Show\AccountViewQuery;
use Domain\Shared\Infrastructure\Bus\Query\QueryBus;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    protected $queryBus;

    public function __construct(QueryBus $queryBus)
    {
        $this->queryBus = $queryBus;
    }


    public function __invoke(Request $request, int $id)
    {
        return $this->queryBus->ask(AccountViewQuery::create($id));
    }
}
