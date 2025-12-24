<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelUser extends Model
{
    public function AllData()
    {
        return $this->db->table('tbl_user')
            ->get()
            ->getResultArray();
    }
}