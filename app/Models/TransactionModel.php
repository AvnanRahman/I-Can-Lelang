<?php

namespace App\Models;

use CodeIgniter\Database\MySQLi\Builder;
use CodeIgniter\Model;

class TransactionModel extends Model
{
    protected $table = 'transaction';
    protected $primaryKey = 'transaction_id';

    protected $allowedFields = [
        'transaction_id',
        'user_id',
        'bid_order_id',
        'transaction_date',
        'shipping_address_id',
        'shipping_price',
        'total'
    ];

    public function insert_transaction($data)
    {

        return $this->db->table('transaction')->insert($data);
    }
}
