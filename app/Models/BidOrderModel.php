<?php

namespace App\Models;

use CodeIgniter\Database\MySQLi\Builder;
use CodeIgniter\Model;

class BidOrderModel extends Model
{
    protected $table = 'bid_order';
    protected $primaryKey = 'bid_order_id';

    protected $allowedFields = [
        'bid_order_id',
        'product_name',
        'product_description',
        'user_id',
        'picture_product_id',
        'increment_in_price_per_bid',
        'bid_start_time',
        'bid_end_time',
        'base_price',
        'buy_it_now_price',
        'current_bid',
        'is_active',
        'is_sold'
    ];

    public function search($keyword)
    {
        $builder = $this->table('bid_order');
        $builder->like('product_name', $keyword);
        $builder->like('product_description', $keyword);
        return $builder;
    }

    public function insert_bidorder($data)
    {
        return $this->db->table('bid_order')->insert($data);
    }
}
