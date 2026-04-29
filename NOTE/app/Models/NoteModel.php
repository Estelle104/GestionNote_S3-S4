<?php

namespace App\Models;

use CodeIgniter\Model;

class NoteModel extends Model
{
    protected $table = 'note';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields = ['id_etudiant', 'id_ue', 'id_resultat', 'note'];
    protected $useTimestamps = false;

    // Validation rules
    protected $validationRules = [
        'id_etudiant' => 'required|integer',
        'id_ue' => 'required|integer',
        'id_resultat' => 'required|integer',
        'note' => 'required|numeric|greater_than_equal_to[0]',
    ];

    protected $validationMessages = [
        'note' => [
            'greater_than_equal_to' => 'La note ne doit pas être négative.',
        ],
    ];
    protected $skipValidation = false;
}
