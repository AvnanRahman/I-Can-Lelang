<?php

namespace App\Models;

use CodeIgniter\Database\MySQLi\Builder;
use CodeIgniter\Model;

class ShippingModel extends Model
{
    protected $table = 'shipping_address';
    protected $primaryKey = 'shipping_address_id';

    protected $allowedFields = [
        'shipping_address_id',
        'full_address',
        'city',
        'zip_code',
        'receiver',
        'phone'
    ];

    public function insert_shippingAddress($data)
    {

        return $this->db->table('shipping_address')->insert($data);
    }
}
