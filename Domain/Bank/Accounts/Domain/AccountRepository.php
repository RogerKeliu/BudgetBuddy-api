<?php

namespace Domain\Bank\Accounts\Domain;

use stdClass;

interface AccountRepository
{
    public function create(array $array): array|null;

    public function all(array $array): array|null;

    public function getById(int $id): array|null;

    public function update(array $array): bool;

    public function delete(int $id): bool;

    public function deleteByArray(array $id): bool;

    public function destroy(int $id): bool;

    public function import (): array;
}
