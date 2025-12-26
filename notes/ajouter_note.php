<?php
session_start();
include '../config/database.php';
$pdo = getConnection();


  $matiere = $_POST['matiere'];
  $note = $_POST['note'];
  $coefficient = $_POST['coefficient'];


?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>TP 1.5 — TODO: Ajouter une note</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container mt-5">
    <a href="../index.php" class="btn btn-secondary mb-3">← Retour</a>
    <h1>TP 1.5 — TODO: Ajouter une note</h1>
    <p class="text-muted">Tâches : valider la note, insérer et rediriger sur la fiche étudiant (page sans PHP).</p>

    <ul>
      <li>TODO: Vérifier que <code>etudiant_id</code> est présent et numérique.</li>
      <li>TODO: Valider <code>note</code> (0-20), <code>coefficient</code> (&gt;0) et <code>matiere</code>.</li>
      <li>TODO: Insérer la note et rediriger vers <code>etudiants/etudiant_details.php?id=...&success=note_added</code>.</li>
    </ul>

    <form method="POST" action="ajouter_note.php">
      <div class="mb-3">
        <label class="form-label">Étudiant *</label>
        <select name="etudiant_id" class="form-select">
          <option value="">-- Sélectionner --</option>
          <option value="1">Dupont Jean</option>
        </select>
      </div>

      <div class="row">
        <div class="col-md-6 mb-3">
          <label class="form-label">Matière *</label>
          <input type="text" name="matiere" class="form-control">
        </div>
        <div class="col-md-3 mb-3">
          <label class="form-label">Note *</label>
          <input type="number" step="0.1" min="0" max="20" name="note" class="form-control">
        </div>
        <div class="col-md-3 mb-3">
          <label class="form-label">Coefficient *</label>
          <input type="number" min="1" name="coefficient" class="form-control" value="1">
        </div>
      </div>

      <div class="mb-3">
        <label class="form-label">Date *</label>
        <input type="date" name="date_note" class="form-control">
      </div>

      <div class="mb-3">
        <label class="form-label">Commentaire</label>
        <textarea name="commentaire" class="form-control"></textarea>
      </div>

      <div class="d-flex justify-content-between">
        <a href="../index.php" class="btn btn-secondary">Annuler</a>
        <button type="submit" class="btn btn-success">Enregistrer</button>
      </div>
    </form>

    <p class="text-muted small mt-3">Page sans PHP — implémentez la logique en PHP pour le TP.</p>
  </div>
</body>
</html> 
