<?php
declare(strict_types=1);

namespace Src\Repositories;


class BaseRepository implements RepositoryInterface
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * @param string $model
     */
    public function setModel(object $model): void
    {
        $this->model = $model;
    }

    /**
     * @param array $data
     * @return object
     */
    public function index(array $data = []): object
    {
        return $this->model->query()
            ->when(count($data), function ($query) use ($data) {
                foreach ($data as $key => $val) {
                    if (in_array($key, $this->model->fillable) && !empty($val)) {
                        $query->where($key, $val);
                    }
                }
                return $query;
            })
            ->orderBy('created_at', 'desc')
            ->paginate(2);
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function insert(array $data): object
    {
        return $this->model->query()
            ->create($data);
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function create(array $data): object
    {
        return $this->model->create($data);
    }

    /**
     * @param int $id
     * @return bool
     */
    public function delete(int $id): bool
    {
        return $this->model->query()->find($id)->delete();
    }

    /**
     * @param array $data
     * @return object
     */
    public function update(array $data): object
    {
        return $this->model->updateOrCreate(
            [$this->model->primaryKey => $data[$this->model->primaryKey]],
            $data
        );
    }
}