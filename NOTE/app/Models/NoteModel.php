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

    protected $allowedFields = [
        'id_etudiant',
        'id_ue',
        'id_resultat',
        'note'
    ];

    protected $useTimestamps = false;

    protected $validationRules = [
        'id_etudiant' => 'required|integer',
        'id_ue'       => 'required|integer',
        'id_resultat' => 'required|integer',
        'note'        => 'required|numeric|greater_than_equal_to[0]',
    ];

    protected $validationMessages = [
        'note' => [
            'greater_than_equal_to' => 'La note ne doit pas être négative.',
        ],
    ];

    protected $skipValidation = false;

    public function addNote($data)
    {
        return $this->insert($data);
    }

    public function getAllNotes()
    {
        return $this->select('
                note.*,
                etudiant.nom,
                etudiant.prenom,
                ue.description AS ue,
                resultat.mention
            ')
            ->join('etudiant', 'etudiant.id = note.id_etudiant')
            ->join('ue', 'ue.id = note.id_ue')
            ->join('resultat', 'resultat.id = note.id_resultat')
            ->findAll();
    }

    public function getNoteById($id)
    {
        return $this->select('
                note.*,
                etudiant.nom,
                etudiant.prenom,
                ue.description AS ue,
                resultat.mention
            ')
            ->join('etudiant', 'etudiant.id = note.id_etudiant')
            ->join('ue', 'ue.id = note.id_ue')
            ->join('resultat', 'resultat.id = note.id_resultat')
            ->where('note.id', $id)
            ->first();
    }

    public function getNotesByEtudiant($idEtudiant)
    {
        return $this->select('
                note.*,
                ue.description AS ue,
                resultat.mention
            ')
            ->join('ue', 'ue.id = note.id_ue')
            ->join('resultat', 'resultat.id = note.id_resultat')
            ->where('note.id_etudiant', $idEtudiant)
            ->findAll();
    }

    public function updateNote($id, $data)
    {
        return $this->update($id, $data);
    }

    public function deleteNote($id)
    {
        return $this->delete($id);
    }
}