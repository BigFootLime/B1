<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
 <!-- **************************************************SIDEBAR*********************************************************************** -->
<body class="bg-gradient-to-r from-[#04CD59] to-[#05B6A1]">
  
<span
      class="absolute text-white text-4xl top-5 left-4 cursor-pointer"
      onclick="openSidebar()"
    >
      <i class="bi bi-filter-left px-2 bg-gray-900 rounded-md"></i>
    </span>
    <div
      class="sidebar fixed top-0 bottom-0 lg:left-0 p-2 w-[300px] overflow-y-auto text-center bg-gray-900 rounded-r-lg"
    >
      <div class="text-gray-100 text-xl">
        <div class="p-2.5 mt-1 flex items-center">
          <img src="../src/assets/LOGOPHARMASYS.png "class=" h-20 w-30 bi bi-app-indicator px-2 py-1 rounded-md "></img>
          <h1 class="font-bold text-gray-200 text-[15px] font-poppins ml-3">PHARMASYS</h1>
          <i
            class="bi bi-x cursor-pointer ml-28 lg:hidden"
            onclick="openSidebar()"
          ></i>
        </div>
        <div class="my-2 bg-gray-600 h-[1px]"></div>
      </div>
      <div
        class="p-2.5 flex items-center rounded-md px-4 duration-300 cursor-pointer bg-gray-700 text-white"
      >
        <i class="bi bi-search text-sm"></i>
        <input
          type="text"
          placeholder="Search"
          class="text-[15px] ml-4 w-full bg-transparent focus:outline-none"
        />
      </div>    	
        <a href="./accueil.php" id="accueilButton" class="text-[15px] ml-4 text-gray-200 font-bold">
        <div
        class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-[#05B6A1] text-white">Accueil
      </div>
    </a>	
    <a href="./accueil.php" id="accueilButton" class="text-[15px] ml-4 text-gray-200 font-bold">
        <div
        class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-[#05B6A1] text-white">Gestion de Stock
      </div>
    </a>	
      <div class="my-4 bg-gray-600 h-[1px]"></div>
      <a href="./accueil.php" id="accueilButton" class="text-[15px] ml-4 text-gray-200 font-bold">
        <div
        class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-[#05B6A1] text-white">Logout
      </div>
    </a>	
      
    </div>

    <script type="text/javascript">
      function dropdown() {
        document.querySelector("#submenu").classList.toggle("hidden");
        document.querySelector("#arrow").classList.toggle("rotate-0");
      }
      dropdown();

      function openSidebar() {
        document.querySelector(".sidebar").classList.toggle("hidden");
      }
    </script>
     <!-- **************************************************SIDEBAR END*********************************************************************** -->
     <!-- **************************************************RECUPERATION DONNEES*********************************************************************** -->
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
      // Se connecter à la base de données
        $pdo = new PDO($dsn, $user, $pass, $options);
        
        // Récupérer toutes les données
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
  <div class="container mx-auto px-4 lg:px-8 xl:ml-80 bg-white rounded-lg shadow-lg mt-6">
    <h1 class="text-xl md:text-2xl font-bold mb-4 text-gray-900">Dashboard</h1>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6">
        <div class="bg-white p-4 rounded-lg shadow-md max-h-screen md:row-span-2">
            <h2 class="text-lg md:text-xl font-semibold mb-2">Produits en Stock</h2>
            <div class="relative h-64 md:h-[80vh]">
                <canvas id="inStockChart" class="w-full h-full"></canvas>
            </div>
        </div>
        <div class="bg-white p-4 rounded-lg shadow-md max-h-80">
            <h2 class="text-lg md:text-xl font-semibold mb-2">Produits Vendus</h2>
            <div class="relative h-64">
                <canvas id="mostSoldChart" class="w-full h-full"></canvas>
            </div>
        </div>
        <div class="bg-white p-4 rounded-lg shadow-md max-h-80">
            <h2 class="text-lg md:text-xl font-semibold mb-2">Produits en rupture de Stock</h2>
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

        // Extraires les labels et les valeurs pour les produits en stock
        var stockLabels = [];
        var stockValues = [];
        for (var i = 0; i < inStockProd.length; i++) {
          // Récupérer le nom et la quantité de chaque produit push permet d'ajouter un élément à la fin du tableau
            stockLabels.push(inStockProd[i].name);
            stockValues.push(inStockProd[i].quantity);
           
        }

        // Extraries les labels et les valeurs pour les produits les plus vendus
        var mostSoldLabels = [];
        var mostSoldValues = [];
        for (var j = 0; j < mostSoldProd.length; j++) {
            mostSoldLabels.push(mostSoldProd[j].name);
            mostSoldValues.push(mostSoldProd[j].sold);
        }

        var lowStockLabels = [];
        var lowStockValues = [];
        for (var k = 0; k < lowStockProd.length; k++) {
          // Récupérer le nom et la quantité de chaque produit push permet d'ajouter un élément à la fin du tableau
          lowStockLabels.push(lowStockProd[k].name);
          lowStockValues.push(lowStockProd[k].quantity);
           
        }

        // Créer les graphiques
        var graph1 = document.getElementById('inStockChart').getContext('2d');
        var inStockChart = new Chart(graph1, {
            type: 'bar', 
            data: {
                labels: stockLabels,
                datasets: [{
                    label: 'Quantité en Stock',
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
        // <!-- **************************************************END TABLEAU 1*********************************************************************** -->
        // <!-- **************************************************TABLEAU 2*********************************************************************** -->
        var graph2 = document.getElementById('mostSoldChart').getContext('2d');
        var mostSoldChart = new Chart(graph2, {
            type: 'pie',
            data: {
                labels: mostSoldLabels,
                datasets: [{
                    label: 'Unités Vendues',
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
                        text: 'Produits les plus Vendus'
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
                    label: 'En rupture de Stock',
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
