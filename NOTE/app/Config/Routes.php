<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/dashboard', 'Home::showDashboard');
$routes->get('/form','Home::showForm');
$routes->get('/list','Home::showList');

// NOTE

// formulaire ajout note
$routes->get('/note', 'NoteController::formAddNote');
// ajouter une note
$routes->post('/note/add', 'NoteController::addNote');
// ajouter plusieurs notes
$routes->post('/note/addMultiple', 'NoteController::addMultipleNotes');
$routes->get('/note/(:num)', 'NoteController::show/$1');
$routes->post('/note/update/(:num)', 'NoteController::updateNote/$1');
$routes->get('/note/delete/(:num)', 'NoteController::deleteNote/$1');
$routes->get('/note/etudiant/(:num)', 'NoteController::getNotesByEtudiant/$1');