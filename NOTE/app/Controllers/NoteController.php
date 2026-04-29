<?php

namespace App\Controllers;

use App\Models\NoteModel;
use App\Models\ResultatModel;
use App\Models\EtudiantModel;
use App\Models\UeModel;
use App\Models\SemestreModel;
use CodeIgniter\Controller;

class NoteController extends Controller
{
    protected $noteModel;
    protected $resultatModel;
    protected $etudiantModel;
    protected $ueModel;
    protected $semestreModel;

    public function __construct()
    {
        $this->noteModel = new NoteModel();
        $this->resultatModel = new ResultatModel();
        $this->etudiantModel = new EtudiantModel();
        $this->ueModel = new UeModel();
        $this->semestreModel = new SemestreModel();
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

    /**
     * Affiche la liste des notes avec gestion (modifier/supprimer)
     */
    public function listNotes()
    {
        $db = \Config\Database::connect();
        
        $notes = $db->table('note')
            ->select('note.id, note.note, etudiant.prenom, etudiant.nom, ue.code, ue.description, ue.credit, resultat.mention, note.id_etudiant, note.id_ue')
            ->join('etudiant', 'etudiant.id = note.id_etudiant')
            ->join('ue', 'ue.id = note.id_ue')
            ->join('resultat', 'resultat.id = note.id_resultat')
            ->orderBy('etudiant.nom', 'ASC')
            ->orderBy('etudiant.prenom', 'ASC')
            ->get()
            ->getResultArray();

        $data = [
            'notes' => $notes,
            'etudiants' => $this->etudiantModel->findAll(),
        ];

        return view('listNotes', $data);
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
        
        // Récupérer la note existante
        $existingNote = $this->noteModel->getNoteById($id);
        if (!$existingNote) {
            return $this->response->setJSON([
                'status' => false,
                'message' => 'Note introuvable'
            ]);
        }

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
            'id_resultat' => $resultat['id'],
            'note'        => $note
        ];

        if (!$this->noteModel->update($id, $data)) {
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

    public function showS3($idEtudiant)
    {
        return $this->renderResultat((int) $idEtudiant, 3, 'resultat_s3');
    }

    public function showS4($idEtudiant)
    {
        return $this->renderResultat((int) $idEtudiant, 4, 'resultat_s4');
    }

    public function showL2($idEtudiant)
    {
        $etudiant = $this->etudiantModel->find((int) $idEtudiant);

        if (!$etudiant) {
            return $this->response->setStatusCode(404)->setBody('Etudiant introuvable');
        }

        $s3Id = $this->getSemestreId(3);
        $s4Id = $this->getSemestreId(4);

        $notesS3 = $this->etudiantModel->getNoteByEtudiant((int) $idEtudiant, $s3Id);
        $notesS4 = $this->etudiantModel->getNoteByEtudiant((int) $idEtudiant, $s4Id);

        $resumeS3 = $this->etudiantModel->calculMoyenne((int) $idEtudiant, $s3Id);
        $resumeS4 = $this->etudiantModel->calculMoyenne((int) $idEtudiant, $s4Id);

        $totalCredits = $resumeS3['credits'] + $resumeS4['credits'];
        $totalPoints = ($resumeS3['moyenne'] * $resumeS3['credits']) + ($resumeS4['moyenne'] * $resumeS4['credits']);
        $moyenne = $totalCredits > 0 ? round($totalPoints / $totalCredits, 2) : 0.0;

        $mention = $this->resultatModel
            ->where('min <=', $moyenne)
            ->where('max >=', $moyenne)
            ->first();

        $data = [
            'etudiant' => $etudiant,
            'notesS3' => $notesS3,
            'notesS4' => $notesS4,
            'credits' => $totalCredits,
            'moyenne' => $moyenne,
            'mention' => $mention['mention'] ?? 'N/A',
            'admis' => $moyenne >= 10,
        ];

        return view('resultat_l2', $data);
    }

    private function renderResultat(int $idEtudiant, int $semestreNumero, string $view)
    {
        $etudiant = $this->etudiantModel->find($idEtudiant);

        if (!$etudiant) {
            return $this->response->setStatusCode(404)->setBody('Etudiant introuvable');
        }

        $idSemestre = $this->getSemestreId($semestreNumero);
        $notes = $this->etudiantModel->getNoteByEtudiant($idEtudiant, $idSemestre);
        $resume = $this->etudiantModel->calculMoyenne($idEtudiant, $idSemestre);

        $mention = $this->resultatModel
            ->where('min <=', $resume['moyenne'])
            ->where('max >=', $resume['moyenne'])
            ->first();

        $data = [
            'etudiant' => $etudiant,
            'notes' => $notes,
            'credits' => $resume['credits'],
            'moyenne' => $resume['moyenne'],
            'mention' => $mention['mention'] ?? 'N/A',
            'admis' => $resume['moyenne'] >= 10,
            'semestre' => $semestreNumero,
        ];

        return view($view, $data);
    }

    private function getSemestreId(int $numero): int
    {
        $semestre = $this->semestreModel
            ->like('description', (string) $numero)
            ->first();

        return (int) ($semestre['id'] ?? $numero);
    }
}