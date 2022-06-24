<?php

namespace App\Models;

use CodeIgniter\Database\MySQLi\Builder;
use CodeIgniter\Model;

class pertanyaanModel extends Model
{
    protected $table = 'pertanyaan';
    protected $primaryKey = 'quest_id';

    protected $allowedFields = [
        'quest_id',
        'question',
        'user_id',
    ];

    public function insert_quest($data)
    {
        return $this->db->table('pertanyaan')->insert($data);
    }
}
