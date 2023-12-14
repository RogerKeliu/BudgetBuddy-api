<?php

namespace App\Http\Controllers\Bank\Account;

use App\Http\Controllers\Controller;
use Domain\Bank\Accounts\Application\List\AccountListQuery;
use Domain\Shared\Infrastructure\Bus\Query\QueryBus;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    protected $queryBus;

    public function __construct(QueryBus $queryBus)
    {
        $this->queryBus = $queryBus;
    }

    /**
     *
     * @param Request $request
     * @return void
     */
    public function __invoke(Request $request)
    {
        $a =  $this->queryBus->ask(AccountListQuery::create());
        return $a;
    }
}
