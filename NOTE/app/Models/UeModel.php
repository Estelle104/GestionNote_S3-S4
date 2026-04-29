<?php

namespace App\Models;

use CodeIgniter\Model;

class UeModel extends Model
{
    protected $table = 'ue';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields = ['description', 'code', 'credit', 'id_semestre', 'is_optionnel'];
    protected $useTimestamps = false;

    // Validation rules
    protected $validationRules = [
        'description' => 'required|string|max_length[100]',
        'code' => 'string|max_length[20]',
        'credit' => 'integer',
        'id_semestre' => 'integer',
        'is_optionnel' => 'integer',
    ];

    protected $validationMessages = [];
    protected $skipValidation = false;
}
