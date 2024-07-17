<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
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

            echo "<h3>Inscription réussie ! Vous allez être redirigé d'ici quelques secondes...</h3>";
            header('Refresh: 3; URL=login.php');
        }
    } else {
        
    }

} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}
?>
<body class="bg-gray-900 h-screen overflow-hidden">
<div class="absolute inset-x-0 top-4 -z-10 flex transform-gpu justify-center overflow-hidden blur-3xl" aria-hidden="true">
      <div class="aspect-[1108/632] w-full flex-none bg-gradient-to-r from-[#80caff] to-[#4f46e5] opacity-25" style="clip-path: polygon(73.6% 51.7%, 91.7% 11.8%, 100% 46.4%, 97.4% 82.2%, 92.5% 84.9%, 75.7% 64%, 55.3% 47.5%, 46.5% 49.4%, 45% 62.9%, 50.3% 87.2%, 21.3% 64.1%, 0.1% 100%, 5.4% 51.1%, 21.4% 63.9%, 58.9% 0.2%, 73.6% 51.7%)"></div>
    </div>
<form action="" method="POST">
<div class="flex min-h-full flex-col justify-center py-12 sm:px-6 lg:px-8">
  <div class="sm:mx-auto sm:w-full sm:max-w-md">
  <img class="mx-auto h-20 w-auto" src="../src/assets/LOGOPHARMASYS.png" alt="NoImage">
  <div class="flex flex-center flex-col justify-center">
    <h2 class="mt-6 text-center text-2xl font-bold leading-9 tracking-tight text-gray-50">Créer votre compte</h2>
    </div>
  </div>

  <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-[480px]">
    <div class="bg-white px-6 py-12 shadow sm:rounded-lg sm:px-12">
      <form class="space-y-6 gap-y-4" action="#" method="POST">
        <div class="mb-4">
          <label for="prenom" class="block text-sm font-medium leading-6 text-gray-900">Prénom</label>
          <div class="mt-2">
            <input id="prenom" value="<?= htmlspecialchars(isset($prenom) ? $prenom : '') ?>" name="prenom" type="text" autocomplete="text" required class="block w-full px-3 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            <?php if (isset($errors['prenom'])): ?>
                <div class="text-red-500 font-bold mt-4 text-center"><?= htmlspecialchars($errors['prenom']) ?></div>
            <?php endif; ?>
          </div>
        </div>

        <div class="mb-4">
          <label for="nom" class="block text-sm font-medium leading-6 text-gray-900">Nom</label>
          <div class="mt-2">
            <input id="nom" value="<?= htmlspecialchars(isset($nom) ? $nom : '') ?>" name="nom" type="text" autocomplete="text" required class="block w-full px-3 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            <?php if (isset($errors['nom'])): ?>
                <div class="text-red-500 font-bold mt-4 text-center"><?= htmlspecialchars($errors['nom']) ?></div>
            <?php endif; ?>
          </div>
        </div>

        <div class="mb-4">
          <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Adresse Email</label>
          <div class="mt-2">
            <input id="email" value="<?= htmlspecialchars(isset($email) ? $email : '') ?>" name="email" type="email" autocomplete="email" required class="block w-full px-3 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            <?php if (isset($errors['email'])): ?>
                <div class="text-red-500 font-bold mt-4 text-center"><?= htmlspecialchars($errors['email']) ?></div>
            <?php endif; ?>
          </div>
        </div>

        <div class="mb-4">
          <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Mot de passe</label>
          <div class="mt-2">
            <input id="mdp" name="mdp" type="password" autocomplete="current-password" required class="block px-3 w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            <?php if (isset($errors['mdp'])): ?>
                <div class="text-red-500 font-bold mt-4 text-center"><?= htmlspecialchars($errors['mdp']) ?></div>
            <?php endif; ?>

          </div>
        </div>

        <div>
          <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Sign Up</button>
        </div>
      </form>

      
    </div>
  </div>
</div>
</form>
</body>

<footer>
</footer>

