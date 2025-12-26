<?php
define('DB_HOST', 'localhost');
define('DB_NAME', 'school_management');
define('DB_USER', 'root');
define('DB_PASS', '');

function getConnection() {
    try {
        $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8mb4";
        $pdo = new PDO($dsn, DB_USER, DB_PASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDOException $e) {
        die("Erreur : " . $e->getMessage());
    }
}
?>
                    <th>Classe</th>
                    <th>Nombre de Notes</th>
                    <th>Moyenne</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($etudiants as $etudiant): ?>
                <tr>
                    <td><?= htmlspecialchars($etudiant['id']) ?></td>
                    <td><?= htmlspecialchars($etudiant['nom_complet']) ?></td>
                    <td><?= htmlspecialchars($etudiant['email']) ?></td>
                    <td><?= htmlspecialchars($etudiant['classe']) ?></td>
                    <td>
                        <?php
                        $stmtNotes = $pdo->prepare("SELECT COUNT(*) FROM notes WHERE etudiant_id = ?");
                        $stmtNotes->execute([$etudiant['id']]);
                        echo $stmtNotes->fetchColumn();
                        ?>
                    </td>
                    <td>
                        <?php
                        $stmtMoyenne = $pdo->prepare("SELECT AVG(note) FROM notes WHERE etudiant_id = ?");
                        $stmtMoyenne->execute([$etudiant['id']]);
                        $moyenne = $stmtMoyenne->fetchColumn();
                        echo $moyenne ? number_format($moyenne, 2) : 'N/A';
                        ?>
                    </td>
                    <td>
                        <a href="etudiants/modifier_etudiant.php?id=<?= $etudiant['id'] ?>" class="btn btn-warning btn-sm">✏️ Modifier</a>
                        <a href="etudiants/supprimer_etudiant.php?id=<?= $etudiant['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet étudiant ?');">🗑️ Supprimer</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>