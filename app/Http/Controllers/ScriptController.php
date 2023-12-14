<?php

namespace App\Http\Controllers;

use Domain\Scripts\Application\Activate\ScriptActivateQuery;
use Domain\Scripts\Application\Activate\ScriptActivateService;
use Domain\Scripts\Application\Create\ScriptCreateQuery;
use Domain\Scripts\Application\Create\ScriptCreateService;
use Domain\Scripts\Application\Destroy\ScriptDestroyQuery;
use Domain\Scripts\Application\Destroy\ScriptDestroyService;
use Domain\Scripts\Application\Disable\ScriptDisableQuery;
use Domain\Scripts\Application\Disable\ScriptDisableService;
use Domain\Scripts\Application\List\ScriptListQuery;
use Domain\Scripts\Application\List\ScriptListService;
use Domain\Scripts\Application\Show\ScriptViewQuery;
use Domain\Scripts\Application\Show\ScriptViewService;
use Domain\Scripts\Application\Update\ScriptUpdateQuery;
use Domain\Scripts\Application\Update\ScriptUpdateService;
use Domain\Scripts\Infrastructure\ScriptRepositoryEloquent;
use Domain\Scripts\Infrastructure\ScriptRepositoryMysql;
use Illuminate\Http\Request;

class ScriptController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $repository = new ScriptRepositoryMysql();
        return (new ScriptListService((new ScriptRepositoryEloquent())))(
            ScriptListQuery::create('a', 'b', 'c', false)
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return (new ScriptCreateService((new ScriptRepositoryEloquent())))(
            ScriptCreateQuery::create($request->all())
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, int $id)
    {
        return (new ScriptViewService((new ScriptRepositoryEloquent())))(
            ScriptViewQuery::create($id)
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return (new ScriptUpdateService((new ScriptRepositoryEloquent())))(
            ScriptUpdateQuery::create($id, $request->all())
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, int $id)
    {
        return (new ScriptDestroyService((new ScriptRepositoryEloquent())))(
            ScriptDestroyQuery::create($id)
        );
    }

    public function activate (Request $request, int $id): int
    {
        return (new ScriptActivateService((new ScriptRepositoryEloquent())))(
            ScriptActivateQuery::create($id)
        );
    }

    public function disable(Request $request, int $id): int
    {
        return (new ScriptDisableService((new ScriptRepositoryEloquent())))(
            ScriptDisableQuery::create($id)
        );
    }
}
