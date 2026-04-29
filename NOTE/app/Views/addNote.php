<!DOCTYPE php>
<php lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>SysInfo — Ajout de notes</title>
  <link rel="stylesheet" href="style.css" />
</head>
<body>

<div class="app">

  <!-- ── Sidebar ──────────────────────────────────────────────────────────── -->
  <aside class="sidebar">
    <div class="sidebar-brand">
      <div class="logo-icon">
        <svg viewBox="0 0 24 24" width="18" height="18"><path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/></svg>
      </div>
      <div>
        <div class="brand-name">SysInfo</div>
        <div class="brand-sub">v2.4.0</div>
      </div>
    </div>

    <div class="sidebar-section">Navigation</div>

    <a href="/dashboard" class="nav-item">
      <svg viewBox="0 0 24 24"><rect width="7" height="9" x="3" y="3" rx="1"/><rect width="7" height="5" x="14" y="3" rx="1"/><rect width="7" height="9" x="14" y="12" rx="1"/><rect width="7" height="5" x="3" y="16" rx="1"/></svg>
      Tableau de bord
    </a>
    <a href="/list" class="nav-item">
      <svg viewBox="0 0 24 24"><line x1="8" y1="6" x2="21" y2="6"/><line x1="8" y1="12" x2="21" y2="12"/><line x1="8" y1="18" x2="21" y2="18"/><line x1="3" y1="6" x2="3.01" y2="6"/><line x1="3" y1="12" x2="3.01" y2="12"/><line x1="3" y1="18" x2="3.01" y2="18"/></svg>
      Étudiants
    </a>
    <a href="/form" class="nav-item">
      <svg viewBox="0 0 24 24"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
      Utilisateurs
    </a>
    <a href="/note" class="nav-item active">
      <svg viewBox="0 0 24 24"><path d="M9 11H7v2h2v-2zm4 0h-2v2h2v-2zm4 0h-2v2h2v-2zm2-7h-1V2h-2v2H8V2H6v2H5c-1.1 0-1.99.9-1.99 2L3 20c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 16H5V9h14v11z"/></svg>
      Ajouter note
    </a>
    <a href="/note/list" class="nav-item">
      <svg viewBox="0 0 24 24"><path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 16H5V5h14v14zm-5.04-6.71l-2.75 3.54-2.16-2.66c-.44-.53-1.25-.58-1.78-.15-.53.44-.58 1.25-.15 1.78l3 3.67c.25.32.61.5.99.5s.74-.18.99-.5l4.25-5.15c.44-.53.39-1.34-.15-1.78-.53-.44-1.34-.39-1.78.15z"/></svg>
      Gestion notes
    </a>

    <div class="sidebar-section">Modules</div>

    <a href="#" class="nav-item">
      <svg viewBox="0 0 24 24"><path d="M3 3h7v7H3zM14 3h7v7h-7zM14 14h7v7h-7zM3 14h7v7H3z"/></svg>
      Catalogue
    </a>
    <a href="#" class="nav-item">
      <svg viewBox="0 0 24 24"><line x1="12" y1="1" x2="12" y2="23"/><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg>
      Comptabilité
    </a>
    <a href="#" class="nav-item">
      <svg viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
      RH
    </a>
    <a href="#" class="nav-item">
      <svg viewBox="0 0 24 24"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>
      Rapports
    </a>

    <div class="sidebar-section">Système</div>

    <a href="#" class="nav-item">
      <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="3"/><path d="M19.07 4.93a10 10 0 0 1 0 14.14M4.93 4.93a10 10 0 0 0 0 14.14"/></svg>
      Paramètres
    </a>

    <div class="sidebar-bottom">
      <a href="login.php" class="user-row">
        <div class="avatar">AD</div>
        <div class="user-info">
          <div class="name">Admin Sys</div>
          <div class="role">Super administrateur</div>
        </div>
      </a>
    </div>
  </aside>

  <!-- ── Main ─────────────────────────────────────────────────────────────── -->
  <div class="main">

    <div class="topbar">
      <div class="topbar-title">Ajout de notes</div>
      <div class="topbar-search">
        <svg viewBox="0 0 24 24"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
        <input type="text" placeholder="Rechercher…" />
      </div>
      <div class="topbar-actions">
        <button class="icon-btn">
          <svg viewBox="0 0 24 24"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"/><path d="M13.73 21a2 2 0 0 1-3.46 0"/></svg>
        </button>
        <button class="icon-btn">
          <svg viewBox="0 0 24 24"><circle cx="12" cy="8" r="4"/><path d="M20 21a8 8 0 1 0-16 0"/></svg>
        </button>
      </div>
    </div>

    <div class="content">

      <div class="page-header">
        <div>
          <h2>Nouvelle note</h2>
          <div class="breadcrumb">Accueil / Notes / <span>Ajouter</span></div>
        </div>
        <a href="/list" class="btn btn-secondary btn-sm">
          <svg viewBox="0 0 24 24"><polyline points="15 18 9 12 15 6"/></svg>
          Retour à la liste
        </a>
      </div>

      <div class="alert alert-info">
        <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
        <span>Les champs marqués d'un <strong>*</strong> sont obligatoires. La note doit être positive et dans la plage définie par le résultat correspondant.</span>
      </div>

      <form id="noteForm" onsubmit="return submitNote(event)">

        <!-- ── 1. Informations de la note ──────────────────────────────── -->
        <div class="form-card section-gap">
          <div class="form-section-title">1. Sélection étudiant et UE</div>
          <div class="form-grid">
            <div>
              <label class="field-label">Étudiant <span class="required">*</span></label>
              <select id="id_etudiant" name="id_etudiant" required>
                <option value="">— Sélectionner un étudiant —</option>
                <?php foreach ($etudiants as $etudiant): ?>
                  <option value="<?= $etudiant['id'] ?>">
                    <?= $etudiant['prenom'] ?> <?= $etudiant['nom'] ?>
                  </option>
                <?php endforeach; ?>
              </select>
            </div>
            <div>
              <label class="field-label">UE (Unité d'Enseignement) <span class="required">*</span></label>
              <select id="id_ue" name="id_ue" required>
                <option value="">— Sélectionner une UE —</option>
                <?php foreach ($ues as $ue): ?>
                  <option value="<?= $ue['id'] ?>" data-optionnel="<?= $ue['is_optionnel'] ?>">
                    <?= $ue['code'] ?> - <?= $ue['description'] ?>
                  </option>
                <?php endforeach; ?>
              </select>
              <div class="field-hint">Les matières optionnelles retiennent la meilleure note</div>
            </div>
          </div>
        </div>

        <!-- ── 2. Saisie de la note ────────────────────────────────────── -->
        <div class="form-card section-gap">
          <div class="form-section-title">2. Saisie de la note</div>
          <div class="form-grid">
            <div>
              <label class="field-label">Note <span class="required">*</span></label>
              <input 
                type="number" 
                id="note" 
                name="note" 
                placeholder="Ex : 15.5" 
                min="0" 
                max="20" 
                step="0.01"
                required 
              />
              <div class="field-hint">La note doit être entre 0 et 20, non négative</div>
            </div>
          </div>
        </div>

        <!-- ── 3. Résultat automatique ─────────────────────────────────── -->
        <div class="form-card section-gap">
          <div class="form-section-title">3. Résultat</div>
          <div class="form-grid">
            <div>
              <label class="field-label">Mention attribuée</label>
              <input 
                type="text" 
                id="mention" 
                name="mention" 
                placeholder="Sera déterminée selon la note" 
                disabled 
              />
              <div class="field-hint">Calculée automatiquement selon la note saisie</div>
            </div>
          </div>
        </div>

        <!-- ── Actions ────────────────────────────────────────────────────── -->
        <div class="form-actions section-gap">
          <button type="submit" class="btn btn-primary">
            <svg viewBox="0 0 24 24"><path d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6v2z"/></svg>
            Ajouter la note
          </button>
          <button type="reset" class="btn btn-secondary">
            <svg viewBox="0 0 24 24"><path d="M3 12a9 9 0 0 1 9-9 9.75 9.75 0 0 1 6.74 2.74L21 8"/><path d="M21 3v6h-6M21 12a9 9 0 0 1-9 9 9.75 9.75 0 0 1-6.74-2.74L3 16"/><path d="M3 21v-6h6"/></svg>
            Réinitialiser
          </button>
        </div>

      </form>

    </div>

  </div>

</div>

<script>
async function submitNote(event) {
  event.preventDefault();

  const idEtudiant = document.getElementById('id_etudiant').value;
  const idUe = document.getElementById('id_ue').value;
  const note = document.getElementById('note').value;

  if (!idEtudiant || !idUe || !note) {
    alert('Veuillez remplir tous les champs obligatoires');
    return false;
  }

  // Vérifier que la note n'est pas négative
  if (note < 0) {
    alert('La note ne doit pas être négative');
    return false;
  }

  try {
    const response = await fetch('/note/add', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded',
      },
      body: new URLSearchParams({
        id_etudiant: idEtudiant,
        id_ue: idUe,
        note: note
      })
    });

    const result = await response.json();

    if (result.status) {
      alert('Note ajoutée avec succès! Mention: ' + result.resultat);
      document.getElementById('noteForm').reset();
      document.getElementById('mention').value = '';
    } else {
      alert('Erreur: ' + (result.message || JSON.stringify(result.errors)));
    }
  } catch (error) {
    alert('Erreur réseau: ' + error.message);
  }

  return false;
}

// Mettre à jour la mention lorsque la note change
document.getElementById('note').addEventListener('change', async function() {
  const note = this.value;
  if (!note || note < 0) {
    document.getElementById('mention').value = '';
    return;
  }

  try {
    // Appel pour récupérer la mention selon la note
    const response = await fetch(`/note/getMention?note=${note}`);
    if (response.ok) {
      const result = await response.json();
      if (result.status) {
        document.getElementById('mention').value = result.mention;
      }
    }
  } catch (error) {
    console.error('Erreur:', error);
  }
});

// Charger les étudiants et UE au chargement de la page
document.addEventListener('DOMContentLoaded', function() {
  console.log('Formulaire d\'ajout de notes chargé');
  
  // Ajouter des contrôles additionnels
  const noteInput = document.getElementById('note');
  const ueSelect = document.getElementById('id_ue');
  
  // Afficher un message selon le type d'UE
  ueSelect.addEventListener('change', function() {
    const selectedOption = this.options[this.selectedIndex];
    const isOptional = selectedOption.getAttribute('data-optionnel');
    
    if (isOptional === '1') {
      console.log('Matière optionnelle - la meilleure note sera retenue');
    } else {
      console.log('Matière obligatoire - la note maximale sera retenue');
    }
  });
});
</script>

</body>
</php>
