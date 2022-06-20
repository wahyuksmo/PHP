<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'email';
    protected $allowedFields = ['nama', 'password', 'token', 'gambar','email'];


   
    public function getData($parameter)
    {
        # code...
        $builder = $this->table($this->table);
        $builder->where('nama=',$parameter);
        $builder->orWhere('email=',$parameter);
        $query = $builder->get();
        return $query->getRowArray();
    }

    public function updateData($data)
    {
        # code...
        $builder = $this->table($this->table);
        if($builder->save($data)) {
            return true;
        }else {
            return false;
        }
    }


}
