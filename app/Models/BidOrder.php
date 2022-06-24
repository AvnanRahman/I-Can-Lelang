<?php

namespace App\Models;

use CodeIgniter\Model;

class BidOrder extends Model
{
    protected $table      = 'bid_order';
    protected $primaryKey = 'bid_order_id';

    public function search($keyword)
    {
        // $builder = $this->table('bid_order');
        // $builder->like('product_name', $keyword);
        // return $builder;
        return $this->table('bid_order')->like('product_name', $keyword)->orLike('product_description', $keyword);
    }
}
