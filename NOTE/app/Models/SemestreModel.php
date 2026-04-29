<?php

namespace App\Models;

use CodeIgniter\Model;

class SemestreModel extends Model
{
    protected $table = 'semestre';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields = ['description'];
    protected $useTimestamps = false;

    // Validation rules
    protected $validationRules = [
        'description' => 'required|string|max_length[50]',
    ];

    protected $validationMessages = [];
    protected $skipValidation = false;
}
