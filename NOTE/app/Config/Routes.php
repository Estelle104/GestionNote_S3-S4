<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'AuthController::form');
$routes->get('/login', 'AuthController::form');
$routes->post('/login', 'AuthController::login');
$routes->get('/logout', 'AuthController::logout');
$routes->get('/dashboard', 'Home::showDashboard', ['filter' => 'role:admin']);
$routes->get('/form','Home::showForm', ['filter' => 'auth']);
$routes->get('/list','Home::showList', ['filter' => 'auth']);

$routes->get('/etudiants/list', 'EtudiantController::list');
$routes->post('/etudiants/filter', 'EtudiantController::filter');

// NOTE

// formulaire ajout note
$routes->get('/note', 'NoteController::formAddNote');
// liste des notes
$routes->get('/note/list', 'NoteController::listNotes');
// ajouter une note
$routes->post('/note/add', 'NoteController::addNote');
// ajouter plusieurs notes
$routes->post('/note/addMultiple', 'NoteController::addMultipleNotes');
$routes->get('/note/(:num)', 'NoteController::show/$1');
$routes->post('/note/update/(:num)', 'NoteController::updateNote/$1');
$routes->get('/note/delete/(:num)', 'NoteController::deleteNote/$1');
$routes->get('/note/etudiant/(:num)', 'NoteController::getNotesByEtudiant/$1');
