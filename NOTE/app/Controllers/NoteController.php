<?php

namespace App\Controllers;

use App\Models\NoteModel;
use App\Models\ResultatModel;
use App\Models\EtudiantModel;
use App\Models\UeModel;
use CodeIgniter\Controller;

class NoteController extends Controller
{
    protected $noteModel;
    protected $resultatModel;
    protected $etudiantModel;
    protected $ueModel;

    public function __construct()
    {
        $this->noteModel = new NoteModel();
        $this->resultatModel = new ResultatModel();
        $this->etudiantModel = new EtudiantModel();
        $this->ueModel = new UeModel();
    }

    /**
     * Affiche le formulaire d'ajout de note
     */
    public function formAddNote()
    {
        $data = [
            'etudiants' => $this->etudiantModel->findAll(),
            'ues' => $this->ueModel->findAll(),
        ];

        return view('addNote', $data);
    }

    public function addNote()
    {
        $note = $this->request->getPost('note');

        $resultat = $this->resultatModel
            ->where('min <=', $note)
            ->where('max >=', $note)
            ->first();

        if (!$resultat) {
            return $this->response->setJSON([
                'status' => false,
                'message' => 'Aucun résultat correspondant à cette note'
            ]);
        }

        $data = [
            'id_etudiant' => $this->request->getPost('id_etudiant'),
            'id_ue'       => $this->request->getPost('id_ue'),
            'id_resultat' => $resultat['id'],
            'note'        => $note
        ];

        if (!$this->noteModel->addNote($data)) {

            return $this->response->setJSON([
                'status' => false,
                'errors' => $this->noteModel->errors()
            ]);
        }

        return $this->response->setJSON([
            'status' => true,
            'message' => 'Note ajoutée avec succès',
            'resultat' => $resultat['mention']
        ]);
    }

    public function addMultipleNotes()
    {
        $notes = $this->request->getJSON(true);

        if (empty($notes)) {

            return $this->response->setJSON([
                'status' => false,
                'message' => 'Aucune donnée reçue'
            ]);
        }

        $errors = [];

        foreach ($notes as $index => $noteData) {

            $resultat = $this->resultatModel
                ->where('min <=', $noteData['note'])
                ->where('max >=', $noteData['note'])
                ->first();

            if (!$resultat) {

                $errors[$index] = [
                    'note' => 'Aucun résultat trouvé pour cette note'
                ];

                continue;
            }

            $data = [
                'id_etudiant' => $noteData['id_etudiant'],
                'id_ue'       => $noteData['id_ue'],
                'id_resultat' => $resultat['id'],
                'note'        => $noteData['note']
            ];

            if (!$this->noteModel->addNote($data)) {

                $errors[$index] = $this->noteModel->errors();
            }
        }

        if (!empty($errors)) {

            return $this->response->setJSON([
                'status' => false,
                'errors' => $errors
            ]);
        }

        return $this->response->setJSON([
            'status' => true,
            'message' => 'Toutes les notes ont été ajoutées avec succès'
        ]);
    }

    public function index()
    {
        $notes = $this->noteModel->getAllNotes();

        return $this->response->setJSON($notes);
    }

    public function show($id)
    {
        $note = $this->noteModel->getNoteById($id);

        if (!$note) {

            return $this->response->setJSON([
                'status' => false,
                'message' => 'Note introuvable'
            ]);
        }

        return $this->response->setJSON($note);
    }

    public function updateNote($id)
    {
        $note = $this->request->getPost('note');

        $resultat = $this->resultatModel
            ->where('min <=', $note)
            ->where('max >=', $note)
            ->first();

        if (!$resultat) {

            return $this->response->setJSON([
                'status' => false,
                'message' => 'Résultat introuvable'
            ]);
        }

        $data = [
            'id_etudiant' => $this->request->getPost('id_etudiant'),
            'id_ue'       => $this->request->getPost('id_ue'),
            'id_resultat' => $resultat['id'],
            'note'        => $note
        ];

        if (!$this->noteModel->updateNote($id, $data)) {

            return $this->response->setJSON([
                'status' => false,
                'errors' => $this->noteModel->errors()
            ]);
        }

        return $this->response->setJSON([
            'status' => true,
            'message' => 'Note modifiée avec succès'
        ]);
    }

    public function deleteNote($id)
    {
        $note = $this->noteModel->getNoteById($id);

        if (!$note) {

            return $this->response->setJSON([
                'status' => false,
                'message' => 'Note introuvable'
            ]);
        }

        $this->noteModel->deleteNote($id);

        return $this->response->setJSON([
            'status' => true,
            'message' => 'Note supprimée avec succès'
        ]);
    }

    public function getNotesByEtudiant($idEtudiant)
    {
        $notes = $this->noteModel->getNotesByEtudiant($idEtudiant);

        return $this->response->setJSON($notes);
    }
}