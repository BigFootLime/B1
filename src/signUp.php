<head>
    <link rel="stylesheet" type="text/css" href="signUp.css"/>
</head>

<?php
session_start();

// Get environment variables
$host = "localhost"; 
$db =  "pharmasys_db";
$user =  getenv('DB_USERNAME_SERVER') ? getenv('DB_USERNAME_SERVER') :"root";
$pass = getenv('DB_PASSWORD_SERVER') ? getenv('DB_PASSWORD_SERVER') : "";
$charset =  getenv('DB_CHARSET_SERVER') ? getenv('DB_CHARSET') : "utf8mb4";


$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

$errors = [];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);

    // Check if form data is submitted
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST)) {
        $prenom = $_POST['prenom'];
        $nom = $_POST['nom'];
        $email = $_POST['email'];
        $password = $_POST['mdp'];

        // Validate input data
        if (strlen($prenom) < 2) $errors['prenom'] = "Le prénom doit contenir au moins 2 lettres.";
        if (strlen($nom) < 2) $errors['nom'] = "Le nom doit contenir au moins 2 lettres.";

        // Check if email is already taken
        $stmt = $pdo->prepare("SELECT COUNT(*) FROM utilisateur WHERE mail = :email");
        $stmt->execute(['email' => $email]);
        if ($stmt->fetchColumn() > 0) $errors['email'] = "L'email est déjà utilisé.";

        // Validate password length
        if (strlen($password) < 10) $errors['mdp'] = "Le mot de passe doit contenir au moins 10 caractères.";

        // If no errors, insert data into database
        if (empty($errors)) {
            $passwordHash = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO utilisateur (prenom, nom, mail, password) VALUES (:prenom, :nom, :mail, :password)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(['prenom' => $prenom, 'nom' => $nom, 'mail' => $email, 'password' => $passwordHash]);

            echo "<h3>Inscription réussie !</h3>";
        }
    } else {
        echo "<h2 class='titleerror'>Aucune donnée n'a été soumise.</h2>";
    }

} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}
?>

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
</body>
<footer>
</footer>

