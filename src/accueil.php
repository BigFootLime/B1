<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<style>
        body {
            font-family: 'Poppins', sans-serif;
        }
        .sidebar {
            z-index: 100;
        }
    </style>
 <!-- **************************************************SIDEBAR*********************************************************************** -->
<body class="relative bg-gray-900 isolate font-poppins overflow-hidden">
<div class="absolute inset-x-0 top-4 -z-20 flex transform-gpu justify-center overflow-hidden blur-3xl" aria-hidden="true">
      <div class="aspect-[1108/632] w-full flex-none bg-gradient-to-r from-[#80caff] to-[#4f46e5] opacity-25" style="clip-path: polygon(73.6% 51.7%, 91.7% 11.8%, 100% 46.4%, 97.4% 82.2%, 92.5% 84.9%, 75.7% 64%, 55.3% 47.5%, 46.5% 49.4%, 45% 62.9%, 50.3% 87.2%, 21.3% 64.1%, 0.1% 100%, 5.4% 51.1%, 21.4% 63.9%, 58.9% 0.2%, 73.6% 51.7%)"></div>
    </div>
    <div class="text-center py-2 font-poppins absolute left-2">
    <button id="drawer-button" class="text-gray-500 hover:text-gray-700 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:text-gray-400 dark:hover:text-gray-500 focus:outline-none dark:focus:ring-gray-600 ">
        <i class="fas fa-bars text-2xl"></i>
    </button>
</div>

<div id="drawer-navigation" class="fixed top-0 left-0 z-40 h-screen p-4 overflow-y-auto transition-transform -translate-x-full bg-[#353184] w-64 dark:bg-[#353184] rounded-r-lg" tabindex="-1" aria-labelledby="drawer-navigation-label">
        <h5 id="drawer-navigation-label" class="text-base font-semibold text-gray-400 uppercase dark:text-gray-400">Menu</h5>
        <button id="close-drawer" type="button" aria-controls="drawer-navigation" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 absolute top-2.5 end-2.5 inline-flex items-center justify-center dark:hover:bg-gray-600 dark:hover:text-white">
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
            </svg>
            <span class="sr-only">Close menu</span>
        </button>
        <div class="py-4 overflow-y-auto">
            <ul class="space-y-2 font-medium">
                <li>
                    <a href="./accueil.php" class="flex items-center p-2 text-gray-100 rounded-lg dark:text-white hover:text-gray-white hover:bg-gray-100 dark:hover:bg-[#1c1a47] group">
                        <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                            <path d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z"/>
                            <path d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z"/>
                        </svg>
                        <span class="ms-3 text-white">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="./gestionproduits.php" class="flex items-center p-2 text-gray-100 rounded-lg dark:text-white hover:text-gray-500 hover:bg-gray-100 dark:hover:bg-[#1c1a47] group">
                        <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
                            <path d="M6.143 0H1.857A1.857 1.857 0 0 0 0 1.857v4.286C0 7.169.831 8 1.857 8h4.286A1.857 1.857 0 0 0 8 6.143V1.857A1.857 1.857 0 0 0 6.143 0Zm10 0h-4.286A1.857 1.857 0 0 0 10 1.857v4.286C10 7.169 10.831 8 11.857 8h4.286A1.857 1.857 0 0 0 18 6.143V1.857A1.857 1.857 0 0 0 16.143 0Zm-10 10H1.857A1.857 1.857 0 0 0 0 11.857v4.286C0 17.169.831 18 1.857 18h4.286A1.857 1.857 0 0 0 8 16.143v-4.286A1.857 1.857 0 0 0 6.143 10Zm10 0h-4.286A1.857 1.857 0 0 0 10 11.857v4.286c0 1.026.831 1.857 1.857 1.857h4.286A1.857 1.857 0 0 0 18 16.143v-4.286A1.857 1.857 0 0 0 16.143 10Z"/>
                        </svg>
                        <span class="flex-1 text-white ms-3 whitespace-nowrap">Product Management</span>
                       
                    </a>
                </li>
                
                <li>
                    <a href="./login.php" class="flex items-center p-2 text-gray-100 rounded-lg dark:text-white hover:text-gray-500 hover:bg-gray-100 dark:hover:bg-[#1c1a47] group">
                        <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 16">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 8h11m0 0L8 4m4 4-4 4m4-11h3a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-3"/>
                        </svg>
                        <span class="flex-1 text-white ms-3 whitespace-nowrap">Logout</span>
                    </a>
                </li>
                
            </ul>
        </div>
    </div>

    <script>
        document.getElementById('drawer-button').addEventListener('click', function() {
            document.getElementById('drawer-navigation').classList.toggle('-translate-x-full');
        });

        document.getElementById('close-drawer').addEventListener('click', function() {
            document.getElementById('drawer-navigation').classList.add('-translate-x-full');
        });
    </script>
     <!-- **************************************************SIDEBAR END*********************************************************************** -->
     <!-- **************************************************RECUPERATION DONNEES*********************************************************************** -->
     <?php

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

        try {
            $pdo = new PDO($dsn, $user, $pass, $options);
            
            $in_stock = $pdo->query("SELECT name, quantity FROM medicaments WHERE quantity > 0")->fetchAll();
            $out_of_stock = $pdo->query("SELECT name, quantity FROM medicaments WHERE quantity <= 0")->fetchAll();
            $most_sold = $pdo->query("SELECT name, sold FROM medicaments ORDER BY sold DESC LIMIT 5")->fetchAll();
            $least_sold = $pdo->query("SELECT name, sold FROM medicaments ORDER BY sold ASC LIMIT 5")->fetchAll();
            $low_stock = $pdo->query("SELECT name, quantity FROM medicaments WHERE quantity < 30")->fetchAll();

        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }
    ?>

     <!-- **************************************************END RECUPERATION DONNEES*********************************************************************** -->
  <!-- **************************************************TABLEAU 1*********************************************************************** -->
  <h1 class="text-xl md:text-2xl font-bold mb-4 pt-4 text-white text-center">Dashboard</h1>
  <div class="mx-auto flex max-w-2xl flex-col gap-16 bg-white/5 px-6 py-16 ring-1 ring-white/10 sm:rounded-3xl sm:p-8 lg:mx-0 lg:max-w-none lg:items-center  xl:gap-x-20 xl:px-20 font-poppins">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6">
        <div class="bg-white p-4 rounded-lg shadow-md max-h-full md:row-span-2">
            <h2 class="text-lg md:text-xl font-semibold mb-2 text-center">Products in Stock</h2>
            <div class="relative h-64 md:h-[70vh]">
                <canvas id="inStockChart" class="w-full h-full"></canvas>
            </div>
        </div>
        <div class="bg-white p-4 rounded-lg shadow-md max-h-80">
            <h2 class="text-lg md:text-xl font-semibold mb-2 text-center">Sold Products</h2>
            <div class="relative h-64">
                <canvas id="mostSoldChart" class="w-full h-full"></canvas>
            </div>
        </div>
        <div class="bg-white p-4 rounded-lg shadow-md max-h-80">
            <h2 class="text-lg md:text-xl font-semibold mb-2 text-center">Products out of Stock</h2>
            <div class="relative h-64">
                <canvas id="noStockChart" class="w-full h-full"></canvas>
            </div>
        </div>
    </div>
</div>

<script>
        // Convertir les données PHP en données JavaScript en utilisant json_encode
        var inStockProd = <?php echo json_encode($in_stock); ?>;
        var mostSoldProd = <?php echo json_encode($most_sold); ?>;
        var lowStockProd = <?php echo json_encode($out_of_stock); ?>;

        
        // Extraire les labels et les valeurs pour les produits en stock
        var stockLabels = [];
        var stockValues = [];
        inStockProd.forEach(function(prod) {
            stockLabels.push(prod.name);
            stockValues.push(prod.quantity);
        });

        // Extraire les labels et les valeurs pour les produits les plus vendus
        var mostSoldLabels = [];
        var mostSoldValues = [];
        mostSoldProd.forEach(function(prod) {
            mostSoldLabels.push(prod.name);
            mostSoldValues.push(prod.sold);
        });

        // Extraire les labels et les valeurs pour les produits en rupture de stock
        var lowStockLabels = [];
        var lowStockValues = [];
        lowStockProd.forEach(function(prod) {
            lowStockLabels.push(prod.name);
            lowStockValues.push(prod.quantity);
        });

        // Créer les graphiques
        var graph1 = document.getElementById('inStockChart').getContext('2d');
        var inStockChart = new Chart(graph1, {
            type: 'bar', 
            data: {
                labels: stockLabels,
                datasets: [{
                    label: 'Quantity in Stock',
                    data: stockValues,
                    backgroundColor: 'rgba(54, 162, 235, 0.6)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        var graph2 = document.getElementById('mostSoldChart').getContext('2d');
        var mostSoldChart = new Chart(graph2, {
            type: 'pie',
            data: {
                labels: mostSoldLabels,
                datasets: [{
                    label: 'Sold Products',
                    data: mostSoldValues,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.6)',
                        'rgba(54, 162, 235, 0.6)',
                        'rgba(255, 206, 86, 0.6)',
                        'rgba(75, 192, 192, 0.6)',
                        'rgba(153, 102, 255, 0.6)',
                        'rgba(255, 159, 64, 0.6)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom',
                    },
                    title: {
                        display: true,
                        text: 'Most Sold Products'
                    }
                }
            }
        });

        var graph3 = document.getElementById('noStockChart').getContext('2d');
        var noStockChart = new Chart(graph3, {
            type: 'bar', 
            data: {
                labels: lowStockLabels,
                datasets: [{
                    label: 'Out of Stock',
                    data: lowStockValues,
                    backgroundColor: 'red',
                    borderColor: 'darkred',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
     <!-- **************************************************END TABLEAU 2*********************************************************************** -->
</div>
</body>
</html>
