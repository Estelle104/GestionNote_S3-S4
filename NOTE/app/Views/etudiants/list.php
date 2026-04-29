<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="container mt-5">
    <h2>Liste des Étudiants</h2>

    <div class="card mb-4">
        <div class="card-body">
            <h5 class="card-title">Filtrer les étudiants</h5>
            <form method="POST" action="<?= base_url('/etudiants/filter') ?>">
                <div class="row">
                    <div class="col-md-3">
                        <label for="nom" class="form-label">Nom</label>
                        <input type="text" class="form-control" id="nom" name="nom" 
                               value="<?= htmlspecialchars($search_nom) ?>" 
                               placeholder="Rechercher par nom">
                    </div>
                    <div class="col-md-3">
                        <label for="prenom" class="form-label">Prénom</label>
                        <input type="text" class="form-control" id="prenom" name="prenom" 
                               value="<?= htmlspecialchars($search_prenom) ?>" 
                               placeholder="Rechercher par prénom">
                    </div>
                    <div class="col-md-3">
                        <label for="sort" class="form-label">Trier par</label>
                        <select class="form-select" id="sort" name="sort">
                            <option value="nom">Nom</option>
                            <option value="prenom">Prénom</option>
                            <option value="id">ID</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="direction" class="form-label">Ordre</label>
                        <select class="form-select" id="direction" name="direction">
                            <option value="ASC">Ascendant</option>
                            <option value="DESC">Descendant</option>
                        </select>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Filtrer</button>
                        <a href="<?= base_url('/etudiants/list') ?>" class="btn btn-secondary">Réinitialiser</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <?php if (!empty($etudiants)): ?>
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>ID Parcours</th>
                        <th>ID Option</th>
                        <!-- <th>Actions</th> -->
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($etudiants as $etudiant): ?>
                        <tr>
                            <td><?= $etudiant['id'] ?></td>
                            <td><?= htmlspecialchars($etudiant['nom']) ?></td>
                            <td><?= htmlspecialchars($etudiant['prenom']) ?></td>
                            <td><?= $etudiant['id_parcours'] ?? '-' ?></td>
                            <td><?= $etudiant['id_option'] ?? '-' ?></td>
                            <!-- <td>
                                <a href="<?= base_url('/etudiants/show/' . $etudiant['id']) ?>" 
                                   class="btn btn-sm btn-info">Voir détails</a>
                            </td> -->
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php else: ?>
        <div class="alert alert-info" role="alert">
            Aucun étudiant trouvé.
        </div>
    <?php endif; ?>
</div>

<?= $this->endSection() ?>
