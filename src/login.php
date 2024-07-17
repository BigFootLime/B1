<?php

$host = "localhost"; 
$db =  "pharmasys_db";
$user =  getenv('DB_USERNAME_SERVER') ? getenv('DB_USERNAME_SERVER') :"root";
$pass = getenv('DB_PASSWORD_SERVER') ? getenv('DB_PASSWORD_SERVER') : "";
$charset =  getenv('DB_CHARSET_SERVER') ? getenv('DB_CHARSET') : "utf8mb4";

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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Pharmasys</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>

<body>
    <form action="" method="POST">
    `<div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
  <div class="sm:mx-auto sm:w-full sm:max-w-sm">
    <img class="mx-auto h-10 w-auto" src="../src/assets/LOGOPHARMASYS.png" alt="NoImage">
    <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-white">Sign in to your account</h2>
    <?php if ($error): ?>
            <p class="errorlogin"><?= htmlspecialchars($error) ?></p>
        <?php endif; ?>
  </div>

  <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
    <form class="space-y-6" action="#" method="POST">
      <div>
        <label for="email" class="block text-sm font-medium leading-6 text-white">Email address</label>
        <div class="mt-2">
          <input id="email" name="email" value="<?= htmlspecialchars(isset($_POST['email']) ? $_POST['email'] : '') ?>" type="email" autocomplete="email" required class="block w-full rounded-md border-0 bg-white/5 py-1.5 text-white shadow-sm ring-1 ring-inset ring-white/10 focus:ring-2 focus:ring-inset focus:ring-indigo-500 sm:text-sm sm:leading-6">
        </div>
      </div>

      <div>
        <div class="flex items-center justify-between">
          <label for="password" class="block text-sm font-medium leading-6 text-white">Password</label>
          <div class="text-sm">
            <a href="#" class="font-semibold text-indigo-400 hover:text-indigo-300">Forgot password?</a>
          </div>
        </div>
        <div class="mt-2">
          <input id="password" name="password" type="password" autocomplete="current-password" required class="block w-full rounded-md border-0 bg-white/5 py-1.5 text-white shadow-sm ring-1 ring-inset ring-white/10 focus:ring-2 focus:ring-inset focus:ring-indigo-500 sm:text-sm sm:leading-6">
        </div>
      </div>

      <div>
        <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-500 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">Sign in</button>
      </div>
    </form>

    <p class="mt-10 text-center text-sm text-gray-400">
      Not a member?
      <a href="#" class="font-semibold leading-6 text-indigo-400 hover:text-indigo-300">Start a 14 day free trial</a>
    </p>
  </div>
</div>
</form>
<!-- <div>
</div>
<img src="./assets/LOGOPHARMASYS.png" alt="NoImage">
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
</div> -->
</body>
</html>