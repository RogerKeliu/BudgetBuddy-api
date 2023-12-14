<?php

namespace Domain\Shared\Infrastructure;

use Illuminate\Database\Eloquent\Model;

class DomainModel
{
    // TODO:  Extend ByEloquentModel function in order to parse between eloquent to this class;
    // TODO: Extend the byEloquentModel in order to interprate automatically the relations from eloquen to other Aggregate class

    public static function createByArray(array $script): array
    {
       return $script;
    }

    public static function createByEloquentModel(Model $eloquentScript): array
    {
        return $eloquentScript->toArray();
    }


}
