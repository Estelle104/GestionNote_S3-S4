<?php

namespace App\Models;

use CodeIgniter\Model;

class EtudiantModel extends Model
{
    protected $table = 'etudiant';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields = ['nom', 'prenom', 'id_parcours', 'id_option'];
    protected $useTimestamps = false;

    // Validation rules
    protected $validationRules = [
        'nom' => 'required|string|max_length[50]',
        'prenom' => 'required|string|max_length[50]',
        'id_parcours' => 'integer',
        'id_option' => 'integer',
    ];

    protected $validationMessages = [];
    protected $skipValidation = false;
}


