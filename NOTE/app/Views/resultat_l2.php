<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Resultat L2</title>
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

    <a href="/dashboard" class="nav-item active">
      <svg viewBox="0 0 24 24"><rect width="7" height="9" x="3" y="3" rx="1"/><rect width="7" height="5" x="14" y="3" rx="1"/><rect width="7" height="9" x="14" y="12" rx="1"/><rect width="7" height="5" x="3" y="16" rx="1"/></svg>
      Tableau de bord
    </a>
    <a href="/list" class="nav-item">
      <svg viewBox="0 0 24 24"><line x1="8" y1="6" x2="21" y2="6"/><line x1="8" y1="12" x2="21" y2="12"/><line x1="8" y1="18" x2="21" y2="18"/><line x1="3" y1="6" x2="3.01" y2="6"/><line x1="3" y1="12" x2="3.01" y2="12"/><line x1="3" y1="18" x2="3.01" y2="18"/></svg>
      Utilisateurs
      <span class="nav-badge">24</span>
    </a>
    <a href="/form" class="nav-item">
      <svg viewBox="0 0 24 24"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
      Formulaire
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
      <a href="/logout" class="user-row">
        <div class="avatar">AD</div>
        <div class="user-info">
          <div class="name">Admin Sys</div>
          <div class="role">Super administrateur</div>
        </div>
      </a>
    </div>
  </aside>
  <div class="main" style="padding:32px">
    <div class="page-header" style="margin-bottom:16px">
      <div>
        <h2>Resultat L2 (S3 + S4)</h2>
        <div class="breadcrumb">Etudiant / <span><?= esc($etudiant['nom'] . ' ' . $etudiant['prenom']) ?></span></div>
      </div>
    </div>

    <div class="table-card" style="margin-bottom:20px">
      <div style="font-weight:600;margin:12px 0">Semestre 3</div>
      <table>
        <thead>
          <tr>
            <th>UE</th>
            <th>Intitule</th>
            <th>Credits</th>
            <th>Note/20</th>
            <th>Resultat</th>
          </tr>
        </thead>
        <tbody>
          <?php if (!empty($notesS3)) : ?>
            <?php foreach ($notesS3 as $note) : ?>
              <tr>
                <td><?= esc($note['code'] ?? '-') ?></td>
                <td><?= esc($note['ue'] ?? '-') ?></td>
                <td><?= esc($note['credit'] ?? '-') ?></td>
                <td><?= esc($note['note'] ?? 0) ?></td>
                <td><?= esc($note['mention'] ?? '-') ?></td>
              </tr>
            <?php endforeach; ?>
          <?php else : ?>
            <tr>
              <td colspan="5">Aucune note pour S3.</td>
            </tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>

    <div class="table-card">
      <div style="font-weight:600;margin:12px 0">Semestre 4</div>
      <table>
        <thead>
          <tr>
            <th>UE</th>
            <th>Intitule</th>
            <th>Credits</th>
            <th>Note/20</th>
            <th>Resultat</th>
          </tr>
        </thead>
        <tbody>
          <?php if (!empty($notesS4)) : ?>
            <?php foreach ($notesS4 as $note) : ?>
              <tr>
                <td><?= esc($note['code'] ?? '-') ?></td>
                <td><?= esc($note['ue'] ?? '-') ?></td>
                <td><?= esc($note['credit'] ?? '-') ?></td>
                <td><?= esc($note['note'] ?? 0) ?></td>
                <td><?= esc($note['mention'] ?? '-') ?></td>
              </tr>
            <?php endforeach; ?>
          <?php else : ?>
            <tr>
              <td colspan="5">Aucune note pour S4.</td>
            </tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>

    <div style="margin-top:20px">
      <div>Credits: <strong><?= esc((string) $credits) ?></strong></div>
      <div>Moyenne generale: <strong><?= esc(number_format((float) $moyenne, 2)) ?></strong></div>
      <div>Mention: <strong><?= esc($mention) ?></strong></div>
      <div><strong><?= $admis ? 'ADMIS(E)' : 'AJOURNE(E)' ?></strong></div>
    </div>
  </div>
</div>

</body>
</html>
