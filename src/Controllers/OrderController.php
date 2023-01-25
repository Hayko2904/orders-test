<?php
declare(strict_types=1);

namespace Src\Controllers;


use Illuminate\Http\Request;
use Src\Repositories\RepositoryInterface;

class OrderController
{
    protected $repository;

    public function __construct(RepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function index(Request $request)
    {
        return response()->json($this->repository->index($request->toArray()));
    }

    public function store(Request $request)
    {
        $order = $this->repository->create($request->toArray());

        return response()->json($order);
    }

    public function destroy(int $id)
    {
        return $this->repository->delete($id);
    }

    public function update(Request $request)
    {
        return $this->repository->update($request->toArray());
    }
}