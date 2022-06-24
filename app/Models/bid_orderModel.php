<?php

namespace App\Models;

use CodeIgniter\Model;

class bid_orderModel extends Model
{
    protected $table      = 'bid_order';
    protected $primaryKey = 'bid_order_id';

    protected $useTimestamps = true;
}
