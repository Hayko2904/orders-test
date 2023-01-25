<?php
declare(strict_types=1);

namespace Src\Repositories;


interface RepositoryInterface
{
    public function setModel(object $model): void;

    public function index(array $data = []);

    public function insert(array $data);

    public function create(array $data);

    public function delete(int $id): bool;

    public function update(array $data);
}