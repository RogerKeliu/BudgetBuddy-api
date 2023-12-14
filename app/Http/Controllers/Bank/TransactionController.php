<?php

namespace App\Http\Controllers\Bank;

use App\Http\Controllers\Controller;
use Domain\Bank\Transactions\Application\Create\TransactionCreateCommand;
use Domain\Bank\Transactions\Application\Create\TransactionCreateService;
use Domain\Bank\Transactions\Application\List\TransactionListQuery;
use Domain\Bank\Transactions\Application\List\TransactionListService;
use Domain\Bank\Transactions\Application\Show\TransactionViewQuery;
use Domain\Bank\Transactions\Application\Show\TransactionViewService;
use Domain\Bank\Transactions\Infrastructure\TransactionRepositoryEloquent;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index(Request $request)
    {
        return (new TransactionListService((new TransactionRepositoryEloquent())))(
            TransactionListQuery::create()
        );
    }

    public function store(Request $request)
    {
        return (new TransactionCreateService((new TransactionRepositoryEloquent())))(
            TransactionCreateCommand::create(
                $request->input('account_id'),
                $request->input('bank_type_id'),
                $request->input('description'),
                $request->input('type'),
                $request->input('amount'),
                $request->input('currency'),
                $request->input('comment'),
                $request->input('available'),
                $request->input('no_profit'),
                $request->input('creation_date'),
            )
        );
    }

    public function show(Request $request, int $id)
    {
        return (new TransactionViewService((new TransactionRepositoryEloquent())))(
            TransactionViewQuery::create($id)
        );
    }
}
