<?php
declare(strict_types=1);

namespace Src\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public $table = 'orders';

    public $primaryKey = 'id';

    public $fillable = [
        'product_name',
        'weight',
        'decription',
        'total_price'
    ];
}