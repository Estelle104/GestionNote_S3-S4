<?php

namespace App\Models;

use CodeIgniter\Model;

class ResultatModel extends Model
{
    protected $table = 'resultat';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields = ['mention', 'min', 'max'];
    protected $useTimestamps = false;

    // Validation rules
    protected $validationRules = [
        'mention' => 'required|string|max_length[50]',
        'min' => 'numeric',
        'max' => 'numeric',
    ];

    protected $validationMessages = [];
    protected $skipValidation = false;
}
