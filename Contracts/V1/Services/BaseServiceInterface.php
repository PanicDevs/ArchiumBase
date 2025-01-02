<?php

declare(strict_types=1);

namespace Modules\Base\Contracts\V1\Services;

use Illuminate\Database\Eloquent\Model;

interface BaseServiceInterface
{
    public function index(?array $column = ['*'], ?array $with = null, ?array $filters = null, ?string $sort = 'desc', ?int $paginate = null): iterable;

    public function show(int $id): Model;

    public function create(array $data): Model;

    public function edit(int $id): Model;

    public function update(int $id, array $data): Model;

    public function destroy(int $id): void;

    public function firstOrCreate(array $attributes, array $data): Model;

    public function updateOrCreate(array $attributes, array $data): Model;
}
