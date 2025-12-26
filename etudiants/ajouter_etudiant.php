<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>TP 1.5 — TODO: Ajouter un étudiant</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container mt-5">
    <a href="../index.php" class="btn btn-secondary mb-3">← Retour</a>
    <h1>TP 1.5 — TODO: Ajouter un étudiant</h1>
    <p class="text-muted">Consigne courte : écrivez le code PHP pour valider et insérer un étudiant en 1h30.</p>

    <ul>
      <li>TODO: Validez les champs (nom, prénom, email, classe, date_naissance).</li>
      <li>TODO: Affichez les erreurs au-dessus du formulaire.</li>
      <li>TODO: Redirigez vers <code>index.php?success=add</code> après insertion.</li>
    </ul>

    <p class="text-muted small">Remarque : ce fichier est intentionnellement simple — remplacez-le par votre implémentation PHP.</p>
  </div>
</body>
</html>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Étudiant</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <style>
        body { background-color: #f8f9fa; padding-top: 20px; }
        .container { max-width: 800px; }
        .card { box-shadow: 0 0 10px rgba(0,0,0,0.1); }
    </style>
</head>
<body>
    <div class="container">
        <!-- En-tête -->
        <div class="card mb-4">
            <div class="card-body">
                <h2 class="card-title">
                    <i class="bi bi-person-plus-fill text-primary"></i>
                    Ajouter un Nouvel Étudiant
                </h2>
            </div>
        </div>

        <!-- Affichage des erreurs -->
        <?php if (!empty($errors)): ?>
            <div class="alert alert-danger">
                <strong>Erreurs :</strong>
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li><?php echo htmlspecialchars($error); ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <!-- Formulaire d'ajout -->
        <div class="card">
            <div class="card-body">
                <form method="POST" action="">
                    <div class="row">
                        <!-- Nom -->
                        <div class="col-md-6 mb-3">
                            <label for="nom" class="form-label">Nom *</label>
                            <input type="text" 
                                   class="form-control" 
                                   id="nom" 
                                   name="nom" 
                                   value="<?php echo isset($_POST['nom']) ? htmlspecialchars($_POST['nom']) : ''; ?>"
                                   required>
                        </div>

                        <!-- Prénom -->
                        <div class="col-md-6 mb-3">
                            <label for="prenom" class="form-label">Prénom *</label>
                            <input type="text" 
                                   class="form-control" 
                                   id="prenom" 
                                   name="prenom" 
                                   value="<?php echo isset($_POST['prenom']) ? htmlspecialchars($_POST['prenom']) : ''; ?>"
                                   required>
                        </div>
                    </div>

                    <div class="row">
                        <!-- Email -->
                        <div class="col-md-6 mb-3">
                            <label for="email" class="form-label">Email *</label>
                            <input type="email" 
                                   class="form-control" 
                                   id="email" 
                                   name="email" 
                                   value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>"
                                   required>
                        </div>

                        <!-- Téléphone -->
                        <div class="col-md-6 mb-3">
                            <label for="telephone" class="form-label">Téléphone</label>
                            <input type="tel" 
                                   class="form-control" 
                                   id="telephone" 
                                   name="telephone" 
                                   value="<?php echo isset($_POST['telephone']) ? htmlspecialchars($_POST['telephone']) : ''; ?>"
                                   placeholder="06xxxxxxxx">
                        </div>
                    </div>

                    <div class="row">
                        <!-- Classe -->
                        <div class="col-md-6 mb-3">
                            <label for="classe" class="form-label">Classe *</label>
                            <select class="form-select" id="classe" name="classe" required>
                                <option value="">-- Sélectionner une classe --</option>
                                <option value="Sixième" <?php echo (isset($_POST['classe']) && $_POST['classe'] == 'Sixième') ? 'selected' : ''; ?>>Sixième</option>
                                <option value="Cinquième" <?php echo (isset($_POST['classe']) && $_POST['classe'] == 'Cinquième') ? 'selected' : ''; ?>>Cinquième</option>
                                <option value="Quatrième" <?php echo (isset($_POST['classe']) && $_POST['classe'] == 'Quatrième') ? 'selected' : ''; ?>>Quatrième</option>
                                <option value="Troisième" <?php echo (isset($_POST['classe']) && $_POST['classe'] == 'Troisième') ? 'selected' : ''; ?>>Troisième</option>
                                <option value="Seconde" <?php echo (isset($_POST['classe']) && $_POST['classe'] == 'Seconde') ? 'selected' : ''; ?>>Seconde</option>
                                <option value="Première L" <?php echo (isset($_POST['classe']) && $_POST['classe'] == 'Première L') ? 'selected' : ''; ?>>Première L</option>
                                <option value="Première S" <?php echo (isset($_POST['classe']) && $_POST['classe'] == 'Première S') ? 'selected' : ''; ?>>Première S</option>
                                <option value="Première ES" <?php echo (isset($_POST['classe']) && $_POST['classe'] == 'Première ES') ? 'selected' : ''; ?>>Première ES</option>
                                <option value="Terminale L" <?php echo (isset($_POST['classe']) && $_POST['classe'] == 'Terminale L') ? 'selected' : ''; ?>>Terminale L</option>
                                <option value="Terminale S" <?php echo (isset($_POST['classe']) && $_POST['classe'] == 'Terminale S') ? 'selected' : ''; ?>>Terminale S</option>
                                <option value="Terminale ES" <?php echo (isset($_POST['classe']) && $_POST['classe'] == 'Terminale ES') ? 'selected' : ''; ?>>Terminale ES</option>
                            </select>
                        </div>

                        <!-- Date de naissance -->
                        <div class="col-md-6 mb-3">
                            <label for="date_naissance" class="form-label">Date de Naissance *</label>
                            <input type="date" 
                                   class="form-control" 
                                   id="date_naissance" 
                                   name="date_naissance" 
                                   value="<?php echo isset($_POST['date_naissance']) ? htmlspecialchars($_POST['date_naissance']) : ''; ?>"
                                   required>
                        </div>
                    </div>

                    <!-- Boutons -->
                    <div class="d-flex justify-content-between mt-4">
                        <a href="../index.php" class="btn btn-secondary">
                            <i class="bi bi-arrow-left"></i> Retour
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-save"></i> Enregistrer
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>