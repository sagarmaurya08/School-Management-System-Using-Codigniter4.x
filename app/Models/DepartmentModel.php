<?php

namespace App\Models;

use CodeIgniter\Model;

class DepartmentModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'department';
    protected $primaryKey       = 'department_id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['name', 'department_code'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function editModelFunction($id){
        $this->db = \Config\Database::connect();
        $dep = $this->findAllData('department');
        $matchData = array();
        foreach($dep as $dep){
            $matchData['name'] = $dep['name'];

            $builder = $this->db->table('designation'); 
            $query = $builder->where('department_id',$dep['department_id'])->get();
            $desi = $query->getResultArray();
            $count = 0;
            foreach($desi as $desi){
                $matchData['designation'][$count++] = $desi['name']; 
            }  
        }
        return $matchData;


    }

    public function findAllData($table)
    {
        $builder = $this->db->table($table); 
        $query = $builder->get();
        return $query->getResultArray();
    }

}
