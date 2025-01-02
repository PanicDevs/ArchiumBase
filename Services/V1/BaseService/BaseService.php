<?php

declare(strict_types=1);

namespace Modules\Base\Services\V1\BaseService;

use Carbon\Carbon;
use Exception;
use Illuminate\Database\Eloquent\Model;
use Modules\Base\Contracts\V1\Services\BaseServiceInterface;

abstract class BaseService implements BaseServiceInterface
{
    /**
     * Service Version
     */
    protected static string $VERSION = '1.0';

    protected Carbon $expire;

    protected Model $model;

    protected string $modelFields;

    /**
     * @throws Exception
     */
    public function __construct()
    {
        $this->makeModel();
        $this->expire = Carbon::now()->addMinutes(config('cache.default_expire'));
        $this->modelFields = str($this->model()).'Fields';
    }

    abstract public function model(): string;

    public function makeModel(): Model
    {
        $model = app()->make($this->model());

        if (! $model instanceof Model) {
            throw new Exception("Class {$this->model()} must be an instance of Illuminate\\Database\\Eloquent\\Model");
        }

        return $this->model = $model;
    }

    public function index(?array $column = null, ?array $with = null, ?array $filters = null, ?string $sort = 'desc', ?int $paginate = null): iterable
    {
        $query = $this->model->query()
            ->select($column ?? $this->modelFields::selectableFields())
            ->when($filters, function ($q) use ($filters): void {
                $q->filter($filters);
            })
            ->when($with, function ($q) use ($with): void {
                $q->with($with);
            })
            ->orderBy('id', $sort);

        return (int) $paginate > 0 ? $query->paginate($paginate)->withQueryString() : $query->get();
    }

    public function show(int $id): Model
    {
        return $this->model->select($this->modelFields::selectableFields())->findOrFail($id);
    }

    public function create(array $data): Model
    {
        return $this->model->create($data);
    }

    public function edit(int $id): Model
    {
        return $this->model->select($this->modelFields::selectableFields())->findOrFail($id);
    }

    public function update(int $id, array $data): Model
    {
        $model = $this->model->select($this->modelFields::selectableFields())->findOrFail($id);
        $model->fill($data);
        $model->save();

        return $model;
    }

    public function destroy(int $id): void
    {
        $model = $this->model->findOrFail($id);
        $model->deleteOrFail($id);
    }

    public function firstOrCreate(array $attributes, array $data): Model
    {
        return $this->model->query()->firstOrCreate($attributes, $data);
    }

    public function updateOrCreate(array $attributes, array $data): Model
    {
        return $this->model
            ->query()
            ->updateOrCreate($attributes, $data);
    }
}
