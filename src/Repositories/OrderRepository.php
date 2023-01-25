<?php


namespace Src\Repositories;


use Src\Models\Order;

class OrderRepository extends BaseRepository
{
    /**
     * OrderRepository constructor.
     */
    public function __construct()
    {
        $this->setModel(new Order());
    }
}