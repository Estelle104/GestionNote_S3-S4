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

    public function getNoteByEtudiant(int $idEtudiant, ?int $idSemestre = null): array
    {
        $builder = $this->db->table('ue')
            ->select('ue.id AS id_ue, ue.description AS ue, ue.code, ue.credit, ue.is_optionnel, semestre.id AS id_semestre, semestre.description AS semestre, note.id AS id_note, note.id_etudiant, note.note, note.id_resultat, resultat.mention')
            ->join('note', 'note.id_ue = ue.id AND note.id_etudiant = ' . (int) $idEtudiant, 'left')
            ->join('semestre', 'semestre.id = ue.id_semestre', 'left')
            ->join('resultat', 'resultat.id = note.id_resultat', 'left');

        if ($idSemestre !== null) {
            $builder->where('ue.id_semestre', $idSemestre);
        }

        return $builder->orderBy('ue.code', 'ASC')->get()->getResultArray();
    }

    public function getNoteParOption(int $idEtudiant, ?int $idSemestre = null): array
    {
        $builder = $this->db->table('ue')
            ->select('ue.id AS id_ue, ue.description AS ue, ue.code, ue.credit, ue.is_optionnel, semestre.id AS id_semestre, semestre.description AS semestre, note.id AS id_note, note.id_etudiant, note.note, note.id_resultat, resultat.mention')
            ->join('note', 'note.id_ue = ue.id AND note.id_etudiant = ' . (int) $idEtudiant, 'left')
            ->join('semestre', 'semestre.id = ue.id_semestre', 'left')
            ->join('resultat', 'resultat.id = note.id_resultat', 'left')
            ->where('ue.is_optionnel', 1);

        if ($idSemestre !== null) {
            $builder->where('ue.id_semestre', $idSemestre);
        }

        return $builder->orderBy('ue.code', 'ASC')->get()->getResultArray();
    }

    public function getNoteOptionParOrdre(int $idEtudiant, ?int $idSemestre = null): array
    {
        $builder = $this->db->table('ue')
            ->select('ue.id AS id_ue, ue.description AS ue, ue.code, ue.credit, ue.is_optionnel, semestre.id AS id_semestre, semestre.description AS semestre, note.id AS id_note, note.id_etudiant, note.note, note.id_resultat, resultat.mention')
            ->join('note', 'note.id_ue = ue.id AND note.id_etudiant = ' . (int) $idEtudiant, 'left')
            ->join('semestre', 'semestre.id = ue.id_semestre', 'left')
            ->join('resultat', 'resultat.id = note.id_resultat', 'left')
            ->where('ue.is_optionnel', 1);

        if ($idSemestre !== null) {
            $builder->where('ue.id_semestre', $idSemestre);
        }

        return $builder->orderBy('note.note', 'DESC')->get()->getResultArray();
    }

    public function getMaxInOptional(int $idEtudiant, ?int $idSemestre = null): ?array
    {
        $options = $this->getNoteOptionParOrdre($idEtudiant, $idSemestre);

        return $options[0] ?? null;
    }

    public function getOptionValidePourEtudiant(int $idEtudiant, ?int $idSemestre = null): ?array
    {
        return $this->getMaxInOptional($idEtudiant, $idSemestre);
    }

    public function calculMoyenne(int $idEtudiant, ?int $idSemestre = null): array
    {
        $notes = $this->getNoteByEtudiant($idEtudiant, $idSemestre);

        if (empty($notes)) {
            return [
                'moyenne' => 0.0,
                'credits' => 0,
            ];
        }

        $totalPoints = 0.0;
        $totalCredits = 0.0;
        $bestOptional = null;

        foreach ($notes as $note) {
            $credit = (float) ($note['credit'] ?? 0);
            $value = (float) ($note['note'] ?? 0);

            if (!empty($note['is_optionnel'])) {
                if ($bestOptional === null || $value > $bestOptional['note']) {
                    $bestOptional = [
                        'note' => $value,
                        'credit' => $credit,
                    ];
                }
                continue;
            }

            $totalPoints += $value * $credit;
            $totalCredits += $credit;
        }

        if ($bestOptional !== null) {
            $totalPoints += $bestOptional['note'] * $bestOptional['credit'];
            $totalCredits += $bestOptional['credit'];
        }

        if ($totalCredits <= 0) {
            return [
                'moyenne' => 0.0,
                'credits' => 0,
            ];
        }

        return [
            'moyenne' => round($totalPoints / $totalCredits, 2),
            'credits' => (int) $totalCredits,
        ];
    }
}


