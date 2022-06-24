<?php

namespace App\Models;

use CodeIgniter\Database\MySQLi\Builder;
use CodeIgniter\Model;

class ImagesModel extends Model
{
    protected $table = 'picture_product';
    protected $primaryKey = 'picture_product_id';

    protected $allowedFields = [
        'picture_product_id',
        'picture1',
        'picture2',
        'picture3',
        'picture4'
    ];

    public function insert_images($data)
    {
        return $this->db->table('picture_product')->insert($data);
    }
}
