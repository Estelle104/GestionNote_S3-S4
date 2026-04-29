# Gestion des notes S3 S4
## But
- Formulaire d 'entrer des notes de toutes les matieres pour chaque etudiant
- Afficher le bulletin d' un etudiant selon tous ses notes S3 et S4
- Afficher les Options auxquels l etudiant peut acceder selon ses notes S4

## Database (script de IA)
### Tables
- etudiant:
  - id
  - nom
  - prenom
  - id_parcours
  - id_option


- parcours:
  - id
  - desc


- UE:
  - id
  - desc
  - code
  - credit
  - id_semestre
  - is_optionnel


- semestre:
  - id
  - desc


- option:
  - id
  - desc


- note:
  - id
  - id_etudiant
  - id_ue
  - id_resultat
  - note


- resultat:
  - id
  - mention
  - min
  - max


- user:
  - id
  - user
  - pwd
  - id_type_user


- type_user
  - id
  - type



## Fonctionalités 
- Login (avec valeur par défaut) 
- Formulaire d' ajout d' une note 
- Liste etudiant
- Clique sur un etudiant, affighe:
  - S3
  - S4 tout option
  - L2 tout option
- 2 liens:
  - S3 ET S4: notes par semestre
  - L2: moyenne pour S3+S4


### 1- Login (Andry)
#### table et model
- user
- type_user

#### fonction dans model: 
- checkLogin
  - check le type user , utiliser filter
- crud

#### route
- "/" ou "/login" : login


#### controller
- retuourne le formulaire
- fait la redirection

#### design
- formulaire de login
  - login
  - mdp
  - bouton se connecter



### 2- ajout de note (Estelle)
#### table et model
- etudiant
- note
- ue
- semestre
- resultat

#### fonction dans model
- note.add
- etudiant.getById
- etudiant.getAll
- ue.getById
- ue.getAll
- semestre.getById
- semestre.getAll
- getResultatByNote (bien/tres bien/...)
  - check la note si entre min et max d'un resultat 
  - retourne la mention

#### controller
- 

#### design
- formulaire d'ajout de note 
  - liste deroulante d'etudiant
  - liste deroulante de ue
  - semestre
  - note
  - bouton ajouter
- div pour message succes ou non

### 3- Liste des etudiants (Miantsa)
#### table et model
- etudiant

#### fonciton dans model
- etudiant.getAll
- filterEtudiant()

#### controller
- 

#### design
- liste des etudiants
- champ de filtre
- bouton filtrer

### 4- Affichage des notes (Tous) 
#### Table et model
- etudiant
- note
- resultat
- option

#### fonction dans model
- getMaxInOptional
- getNoteByEtudiant
- getNoteParOption
- getNoteOptionParOrdre
- getOptionValidePourEtudiant
- calculMoyenne

#### COntroller


#### Design
- Page voir resultat
  - lien : voir S3 (Andry)
      - affichage bulletin de note S3
  - lien : voir S4 (Estelle)
    - affichage bulletin de note S4
      - afficher par option 
  - lien : voir L2 (Miantsa)
    - affichage dee 2 semestres et une moyenne (S3+S4)


## Design a faire 
- Personnaliser le template avec le fichier SCSS fourni

## Regle de gestion
- Pour une matière, on prend la note maximale
- Pour les matières optionnels, on prend la matière qui a la meilleure note
