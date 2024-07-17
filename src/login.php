<?php

$host = "localhost"; 
$db =  "pharmasys_db";
$user =  getenv('DB_USERNAME_SERVER') ? getenv('DB_USERNAME_SERVER') :"root";
$pass = getenv('DB_PASSWORD_SERVER') ? getenv('DB_PASSWORD_SERVER') : "";
$charset =  getenv('DB_CHARSET_SERVER') ? getenv('DB_CHARSET') : "utf8mb4";


echo "<script>console.log('Database Name: " . $host . "');</script>";
echo "<script>console.log('Database Name: " . $user . "');</script>";
echo "<script>console.log('Database Name: " . $db . "');</script>";
echo "<script>console.log('Database Name: " . $pass . "');</script>";
echo "<script>console.log('Database Name: " . $charset . "');</script>";

$connexion_string = "mysql:host=$host;dbname=$db;charset=$charset";
echo "<script>console.log('mysql:host=$host;dbname=$db;charset=$charset');</script>";

$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];

$error = '';

try {
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST)) {
        var_dump($pass);
        $pdo = new PDO($connexion_string, $user, $pass, $options);

        $email = $_POST['email'];
        $password = $_POST['password'];

        $stmt = $pdo->prepare("SELECT * FROM utilisateur WHERE mail = :email");
        $stmt->execute(['email' => $email]);
        $userfound = $stmt->fetch();

        if ($userfound && password_verify($password, $userfound['password'])) {
            $_SESSION['user'] = $userfound['id'];
            header('Location: accueil.php');
            exit;
        } else {
            $error = 'Identifiants incorrects';
        }
    }
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}
?>
<html lang="fr">


<head>
    <title>LogIn PharmaSys</title>
    <link rel="stylesheet" type="text/css" href="login.css" />
</head>

<body>
<div>
</div>
<img src="../src/assets/LOGOPHARMASYS.png" alt="NoImage">
<h3>PharmaSys, gestion de stock simplifié et efficace !</h3>
<div class="container" id="container">
    <div class="form-container sign-up-container">
    </div>
<div class="form-container sign-in-container">
    <form action="" method="POST">
        <h2>Sign in</h2>
        <?php if ($error): ?>
            <p class="errorlogin"><?= htmlspecialchars($error) ?></p>
        <?php endif; ?>
        <input type="email" name="email" placeholder="Email" value="<?= htmlspecialchars(isset($_POST['email']) ? $_POST['email'] : '') ?>" required/>
        <input type="password" name="password" placeholder="Mot de passe" required/>
        <button type="submit">Sign In</button>
    </form>
</div>
    <div class="overlay-container">
        <div class="overlay">
            <div class="overlay-panel overlay-right">
                <form class="formtrans" method="post" action="signUp.php">
                    <h1>Bonjour!</h1>
                    <p>Si vous n'avez pas de compte, venez le crée ici!</p>
                    <button class="ghost" id="signUp" type="submit">Sign Up</button>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>