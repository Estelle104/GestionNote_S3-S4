<?php

namespace App\Controllers;

use App\Models\EtudiantModel;

class EtudiantController extends BaseController
{
    protected $etudiantModel;

    public function __construct()
    {
        $this->etudiantModel = new EtudiantModel();
    }

    public function list()
    {
        $etudiants = $this->etudiantModel->getAll();

        $data = [
            'etudiants' => $etudiants,
            'search_nom' => '',
            'search_prenom' => '',
            'search_parcours' => '',
            'search_option' => ''
        ];

        return view('etudiants/list', $data);
    }

    public function filter()
    {
        $nom = $this->request->getPost('nom');
        $prenom = $this->request->getPost('prenom');
        $id_parcours = $this->request->getPost('id_parcours');
        $id_option = $this->request->getPost('id_option');
        $sort = $this->request->getPost('sort') ?? 'nom';
        $direction = $this->request->getPost('direction') ?? 'ASC';

        $nom = empty($nom) ? null : $nom;
        $prenom = empty($prenom) ? null : $prenom;
        $id_parcours = empty($id_parcours) ? null : (int)$id_parcours;
        $id_option = empty($id_option) ? null : (int)$id_option;

        $etudiants = $this->etudiantModel->filterEtudiant(
            nom: $nom,
            prenom: $prenom,
            id_parcours: $id_parcours,
            id_option: $id_option,
            sort: $sort,
            direction: $direction
        );

        $data = [
            'etudiants' => $etudiants,
            'search_nom' => $nom ?? '',
            'search_prenom' => $prenom ?? '',
            'search_parcours' => $id_parcours ?? '',
            'search_option' => $id_option ?? ''
        ];

        return view('etudiants/list', $data);
    }

}
