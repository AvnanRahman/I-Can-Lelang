<?php

namespace App\Models;

use CodeIgniter\Database\MySQLi\Builder;
use CodeIgniter\Model;

class TransactionLogModel extends Model
{
    protected $table = 'bid_transaction_log';
    protected $primaryKey = 'bid_transaction_log_id';

    protected $allowedFields = [
        'transaction_id',
        'user_id',
        'total'
    ];

    public function insert_transactionLog($data)
    {
        return $this->db->table('bid_transaction_log')->insert($data);
    }
}
