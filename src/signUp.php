<?php
$host = '127.0.0.1';
$db   = 'pharmasys_db';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST)) {
        $prenom = $_POST['prenom'];
        $nom = $_POST['nom'];
        $email = $_POST['email'];
        $password = $_POST['mdp'];

        // Validate name and surname
        if (strlen($prenom) < 2) $errors['prenom'] = "Le prénom doit contenir au moins 2 lettres.";
        if (strlen($nom) < 2) $errors['nom'] = "Le nom doit contenir au moins 2 lettres.";

        // Validate email uniqueness
        $stmt = $pdo->prepare("SELECT COUNT(*) FROM utilisteur WHERE mail = :email");
        $stmt->execute(['email' => $email]);
        if ($stmt->fetchColumn() > 0) $errors['email'] = "L'email est déjà utilisé.";

        // Validate password length
        if (strlen($password) < 10) $errors['mdp'] = "Le mot de passe doit contenir au moins 10 caractères.";

        // If no errors, proceed with insertion
        if (empty($errors)) {
            $passwordHash = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO utilisteur (prenom, nom, mail, password) VALUES (:prenom, :nom, :mail, :password)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(['prenom' => $prenom, 'nom' => $nom, 'mail' => $email, 'password' => $passwordHash]);
            echo "Inscription réussie !";
        }
    } else {
        echo "Erreur: Aucune donnée soumise.";
    }

} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}
?>

<link rel="stylesheet" type="text/css" href="signUp.css"/>
</head>
<body>
<div class="container" id="container">
    <div class="form-container sign-up-container">
        <form action="" method="POST">
            <h1>Sign Up</h1>
            <input type="text" name="prenom" placeholder="Prénom" value="<?= htmlspecialchars(isset($prenom) ? $prenom : '') ?>" required />
            <?php if (isset($errors['prenom'])): ?>
                <div class="error"><?= htmlspecialchars($errors['prenom']) ?></div>
            <?php endif; ?>

            <input type="text" name="nom" placeholder="Nom" value="<?= htmlspecialchars(isset($nom) ? $nom : '') ?>" required />
            <?php if (isset($errors['nom'])): ?>
                <div class="error"><?= htmlspecialchars($errors['nom']) ?></div>
            <?php endif; ?>

            <input type="email" name="email" placeholder="Email" value="<?= htmlspecialchars(isset($email) ? $email : '') ?>" required />
            <?php if (isset($errors['email'])): ?>
                <div class="error"><?= htmlspecialchars($errors['email']) ?></div>
            <?php endif; ?>

            <input type="password" name="mdp" placeholder="Mot de passe" required />
            <?php if (isset($errors['mdp'])): ?>
                <div class="error"><?= htmlspecialchars($errors['mdp']) ?></div>
            <?php endif; ?>

            <button type="submit">Sign Up</button>
        </form>
    </div>
</div>
<footer>
</footer>

