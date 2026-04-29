<?php

namespace App\Models;

use CodeIgniter\Model;

class ParcourModel extends Model
{
    protected $table = 'parcours';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields = ['description'];
    protected $useTimestamps = false;

    // Validation rules
    protected $validationRules = [
        'description' => 'required|string|max_length[100]',
    ];

    protected $validationMessages = [];
    protected $skipValidation = false;
}
