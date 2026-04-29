<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>SysInfo — Gestion des notes</title>
  <link rel="stylesheet" href="/style.css" />
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
    <a href="/note" class="nav-item">
      <svg viewBox="0 0 24 24"><path d="M9 11H7v2h2v-2zm4 0h-2v2h2v-2zm4 0h-2v2h2v-2zm2-7h-1V2h-2v2H8V2H6v2H5c-1.1 0-1.99.9-1.99 2L3 20c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 16H5V9h14v11z"/></svg>
      Ajouter note
    </a>
    <a href="/note/list" class="nav-item active">
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
      <div class="topbar-title">Gestion des notes</div>
      <div class="topbar-search">
        <svg viewBox="0 0 24 24"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
        <input type="text" id="searchInput" placeholder="Rechercher par étudiant ou UE…" />
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
          <h2>Liste des notes par étudiant</h2>
          <div class="breadcrumb">Accueil / Notes / <span>Gestion</span></div>
        </div>
        <a href="/note" class="btn btn-primary btn-sm">
          <svg viewBox="0 0 24 24"><path d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6v2z"/></svg>
          Ajouter une note
        </a>
      </div>

      <!-- Filtre par étudiant -->
      <div class="form-card section-gap">
        <div class="form-grid">
          <div>
            <label class="field-label">Filtrer par étudiant</label>
            <select id="filterEtudiant">
              <option value="">— Tous les étudiants —</option>
              <?php foreach ($etudiants as $etudiant): ?>
                <option value="<?= $etudiant['id'] ?>">
                  <?= $etudiant['prenom'] ?> <?= $etudiant['nom'] ?>
                </option>
              <?php endforeach; ?>
            </select>
          </div>
        </div>
      </div>

      <!-- Tableau des notes -->
      <div class="form-card section-gap">
        <div class="form-section-title">Notes enregistrées</div>
        
        <?php if (empty($notes)): ?>
          <div class="alert alert-info">
            <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
            <span>Aucune note enregistrée pour le moment.</span>
          </div>
        <?php else: ?>
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th>Étudiant</th>
                  <th>UE</th>
                  <th>Crédit</th>
                  <th>Note/20</th>
                  <th>Résultat</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody id="notesTableBody">
                <?php foreach ($notes as $note): ?>
                  <tr class="note-row" data-etudiant="<?= $note['id_etudiant'] ?>">
                    <td>
                      <strong><?= $note['prenom'] ?> <?= $note['nom'] ?></strong>
                    </td>
                    <td><?= $note['code'] ?> - <?= $note['description'] ?></td>
                    <td><?= $note['credit'] ?> crédits</td>
                    <td>
                      <span class="badge badge-info"><?= number_format($note['note'], 2) ?></span>
                    </td>
                    <td>
                      <span class="badge badge-<?= strtolower(str_replace(' ', '-', $note['mention'])) ?>">
                        <?= $note['mention'] ?>
                      </span>
                    </td>
                    <td>
                      <div class="action-buttons">
                        <button class="btn btn-sm btn-secondary" onclick="editNote(<?= $note['id'] ?>, <?= $note['id_etudiant'] ?>, <?= $note['id_ue'] ?>, <?= $note['note'] ?>)" title="Modifier">
                          <svg viewBox="0 0 24 24"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
                        </button>
                        <button class="btn btn-sm btn-danger" onclick="deleteNote(<?= $note['id'] ?>)" title="Supprimer">
                          <svg viewBox="0 0 24 24"><polyline points="3 6 5 6 21 6"/><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/><line x1="10" y1="11" x2="10" y2="17"/><line x1="14" y1="11" x2="14" y2="17"/></svg>
                        </button>
                      </div>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        <?php endif; ?>
      </div>

    </div>

  </div>

</div>

<!-- Modal de modification -->
<div id="editModal" class="modal" style="display: none;">
  <div class="modal-content">
    <div class="modal-header">
      <h2>Modifier la note</h2>
      <button class="close-btn" onclick="closeEditModal()">&times;</button>
    </div>
    <div class="modal-body">
      <form id="editForm">
        <input type="hidden" id="editNoteId" />
        <div class="form-grid">
          <div>
            <label class="field-label">Note <span class="required">*</span></label>
            <input 
              type="number" 
              id="editNoteValue" 
              placeholder="Ex : 15.5" 
              min="0" 
              max="20" 
              step="0.01"
              required 
            />
          </div>
        </div>
      </form>
    </div>
    <div class="modal-footer">
      <button class="btn btn-secondary" onclick="closeEditModal()">Annuler</button>
      <button class="btn btn-primary" onclick="submitEditNote()">Modifier</button>
    </div>
  </div>
</div>

<style>
.table-responsive {
  overflow-x: auto;
  margin-top: 1rem;
}

.table {
  width: 100%;
  border-collapse: collapse;
  font-size: 0.95rem;
}

.table thead {
  background-color: #f5f5f5;
  border-bottom: 2px solid #ddd;
}

.table th {
  padding: 0.75rem;
  text-align: left;
  font-weight: 600;
  color: #333;
}

.table td {
  padding: 0.75rem;
  border-bottom: 1px solid #eee;
}

.table tbody tr:hover {
  background-color: #f9f9f9;
}

.badge {
  display: inline-block;
  padding: 0.25rem 0.75rem;
  border-radius: 1rem;
  font-size: 0.85rem;
  font-weight: 500;
}

.badge-info {
  background-color: #e3f2fd;
  color: #1976d2;
}

.badge-passable,
.badge-assez-bien,
.badge-bien {
  background-color: #c8e6c9;
  color: #388e3c;
}

.badge-ajourné {
  background-color: #ffcdd2;
  color: #d32f2f;
}

.badge-compensé {
  background-color: #fff9c4;
  color: #f57f17;
}

.badge-très-bien,
.badge-excellent {
  background-color: #bbdefb;
  color: #1565c0;
}

.action-buttons {
  display: flex;
  gap: 0.5rem;
}

.btn-sm {
  padding: 0.4rem 0.8rem;
  font-size: 0.85rem;
}

.btn-secondary {
  background-color: #f0f0f0;
  color: #333;
  border: 1px solid #ddd;
}

.btn-secondary:hover {
  background-color: #e0e0e0;
}

.btn-danger {
  background-color: #ffebee;
  color: #d32f2f;
  border: 1px solid #ffcdd2;
}

.btn-danger:hover {
  background-color: #ffcdd2;
}

.modal {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.5);
  display: flex;
  align-items: center;
  justify-content: center;
  z-index: 1000;
}

.modal-content {
  background-color: white;
  border-radius: 0.5rem;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  max-width: 500px;
  width: 90%;
}

.modal-header {
  padding: 1.5rem;
  border-bottom: 1px solid #eee;
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.modal-header h2 {
  margin: 0;
  font-size: 1.25rem;
}

.close-btn {
  background: none;
  border: none;
  font-size: 1.5rem;
  cursor: pointer;
  color: #999;
}

.close-btn:hover {
  color: #333;
}

.modal-body {
  padding: 1.5rem;
}

.modal-footer {
  padding: 1.5rem;
  border-top: 1px solid #eee;
  display: flex;
  justify-content: flex-end;
  gap: 0.75rem;
}
</style>

<script>
let currentEditNoteId = null;

function editNote(noteId, idEtudiant, idUe, noteValue) {
  currentEditNoteId = noteId;
  document.getElementById('editNoteId').value = noteId;
  document.getElementById('editNoteValue').value = noteValue;
  document.getElementById('editModal').style.display = 'flex';
}

function closeEditModal() {
  document.getElementById('editModal').style.display = 'none';
  currentEditNoteId = null;
}

async function submitEditNote() {
  const noteId = document.getElementById('editNoteId').value;
  const noteValue = document.getElementById('editNoteValue').value;

  if (!noteValue || noteValue < 0) {
    alert('La note doit être positive');
    return;
  }

  try {
    const response = await fetch(`/note/update/${noteId}`, {
      method: 'POST',
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded',
      },
      body: new URLSearchParams({
        note: noteValue
      })
    });

    const result = await response.json();

    if (result.status) {
      alert('Note modifiée avec succès');
      closeEditModal();
      location.reload();
    } else {
      alert('Erreur: ' + result.message);
    }
  } catch (error) {
    alert('Erreur: ' + error.message);
  }
}

async function deleteNote(noteId) {
  if (confirm('Êtes-vous sûr de vouloir supprimer cette note ?')) {
    try {
      const response = await fetch(`/note/delete/${noteId}`);
      const result = await response.json();

      if (result.status) {
        alert('Note supprimée avec succès');
        location.reload();
      } else {
        alert('Erreur: ' + result.message);
      }
    } catch (error) {
      alert('Erreur: ' + error.message);
    }
  }
}

// Filtre par étudiant
document.getElementById('filterEtudiant').addEventListener('change', function() {
  const filterId = this.value;
  const rows = document.querySelectorAll('.note-row');

  rows.forEach(row => {
    if (!filterId) {
      row.style.display = '';
    } else {
      row.style.display = row.getAttribute('data-etudiant') === filterId ? '' : 'none';
    }
  });
});

// Recherche
document.getElementById('searchInput').addEventListener('keyup', function() {
  const searchText = this.value.toLowerCase();
  const rows = document.querySelectorAll('.note-row');

  rows.forEach(row => {
    const text = row.textContent.toLowerCase();
    row.style.display = text.includes(searchText) ? '' : 'none';
  });
});

// Fermer le modal en cliquant en dehors
document.getElementById('editModal').addEventListener('click', function(e) {
  if (e.target === this) {
    closeEditModal();
  }
});
</script>

</body>
</html>
