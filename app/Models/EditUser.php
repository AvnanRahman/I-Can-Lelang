<?php

namespace App\Models;

use CodeIgniter\Model;

class EditUser extends Model
{
    protected $table      = 'users';
    protected $primaryKey = 'id';
    protected $useTimestamps = true;
    protected $allowedFields = ['fullname', 'date_of_birth', 'address', 'phone_number', 'is_seller', 'profile', 'balance'];

    public function getUser($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id' => $id])->first();
    }
}
