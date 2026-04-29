<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-8">
            <h2>Détails de l'étudiant</h2>

            <div class="card">
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <strong>ID:</strong>
                        </div>
                        <div class="col-md-8">
                            <?= $etudiant['id'] ?>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4">
                            <strong>Nom:</strong>
                        </div>
                        <div class="col-md-8">
                            <?= htmlspecialchars($etudiant['nom']) ?>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4">
                            <strong>Prénom:</strong>
                        </div>
                        <div class="col-md-8">
                            <?= htmlspecialchars($etudiant['prenom']) ?>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4">
                            <strong>ID Parcours:</strong>
                        </div>
                        <div class="col-md-8">
                            <?= $etudiant['id_parcours'] ?? '-' ?>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4">
                            <strong>ID Option:</strong>
                        </div>
                        <div class="col-md-8">
                            <?= $etudiant['id_option'] ?? '-' ?>
                        </div>
                    </div>

                    <div class="mt-4">
                        <a href="<?= base_url('/etudiants/list') ?>" class="btn btn-secondary">Retour à la liste</a>
                        <a href="<?= base_url('/notes/ajouter/' . $etudiant['id']) ?>" class="btn btn-primary">Ajouter une note</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
