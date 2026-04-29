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

    public function getAll()
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT * FROM etudiant");
        return $query->getResultArray();
        // return $this->findAll();
    }


    public function filterEtudiant(?string $nom = null, ?string $prenom = null, ?int $id_parcours = null, ?int $id_option = null, ?string $sort = null, ?string $direction = 'ASC'): array
    {
        $builder = $this->builder();
        $builder->select('*');

        if ($nom !== null && trim($nom) !== '') {
            $builder->like('nom', trim($nom));
        }

        if ($prenom !== null && trim($prenom) !== '') {
            $builder->like('prenom', trim($prenom));
        }

        if ($id_parcours !== null) {
            $builder->where('id_parcours', $id_parcours);
        }

        if ($id_option !== null) {
            $builder->where('id_option', $id_option);
        }

        [$sort, $direction] = $this->normalizeSort($sort, $direction);
        if ($sort) {
            $builder->orderBy($sort, $direction);
        }

        return $builder->get()->getResultArray();
    }

}


