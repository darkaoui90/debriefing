<?php
session_start();
require_once __DIR__ . '/config/database.php';

$etudiants = [];
$dbError = null;

try {
    $pdo = getConnection();
    $stmt = $pdo->query("SELECT id, nom, prenom, email, classe FROM etudiants ORDER BY id DESC");
    $etudiants = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    $dbError = "Erreur de base de donnees : " . $e->getMessage();
}

$flashSuccess = null;
$flashError = null;

if (isset($_GET['success'])) {
    $flashSuccess = "Operation reussie.";
}

if (isset($_GET['error'])) {
    $flashError = "Operation echouee.";
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Gestion ecole - des etudiants</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Des Gestion des etudiants et Notes</h1>
        
        <div class="mb-3">
            <a href="etudiants/ajouter_etudiant.php" class="btn btn-primary"> Nouvel etudiant</a>
            <a href="notes/ajouter_note.php" class="btn btn-success"> Ajouter une Note</a>
        </div>

        <?php if ($flashSuccess): ?>
            <div class="alert alert-success"><?php echo htmlspecialchars($flashSuccess); ?></div>
        <?php endif; ?>

        <?php if ($flashError): ?>
            <div class="alert alert-danger"><?php echo htmlspecialchars($flashError); ?></div>
        <?php endif; ?>

        <?php if ($dbError): ?>
            <div class="alert alert-danger"><?php echo htmlspecialchars($dbError); ?></div>
        <?php endif; ?>
        
        <table class="table table-striped table-hover">
            <thead >
                <tr>
                    <th>ID</th>
                    <th>Nom Complet</th>
                    <th>Email</th>
                    <th>Classe</th>
                    <th>Nb Notes</th>
                    <th>Moyenne</th>
                    <th>Min/Max</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($etudiants)): ?>
                    <tr>
                        <td colspan="8" class="text-center text-muted">Aucun etudiant trouve.</td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($etudiants as $etudiant): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($etudiant['id']); ?></td>
                            <td><?php echo htmlspecialchars($etudiant['nom'] . ' ' . $etudiant['prenom']); ?></td>
                            <td><?php echo htmlspecialchars($etudiant['email']); ?></td>
                            <td><?php echo htmlspecialchars($etudiant['classe']); ?></td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>
                                <a href="etudiants/ajouter_etudiant.php?id=<?php echo urlencode($etudiant['id']); ?>" class="btn btn-sm btn-warning">Modifier</a>
                                <form method="POST" action="etudiants/supprimer_etudiant.php" style="display:inline;">
                                    <input type="hidden" name="id" value="<?php echo htmlspecialchars($etudiant['id']); ?>">
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Supprimer cet etudiant ?');">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
