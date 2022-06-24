<?php

namespace App\Models;

use CodeIgniter\Model;

class bidLogModel extends Model
{
    protected $table      = 'bid_log';
    protected $primaryKey = 'bid_log_id';

    protected $allowedFields = [
        'bid_log_id',
        'last_bid',
        'user_id',
        'bid_order_id',
    ];
}
