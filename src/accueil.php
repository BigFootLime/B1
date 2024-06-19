<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
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
      <div
        class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-[#05B6A1] text-white"
      >
        <i class="bi bi-house-door-fill"></i>
		<form class="bg-transparent" action="accueil.php" method="post">
        <button type="submit" value="Envoyer" id="accueilButton" class="text-[15px] ml-4 text-gray-200 font-bold">
			Accueil
		</button>
		</form>
		
      </div>
      <div
        class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-[#05B6A1] text-white"
      >
        <i class="bi bi-bookmark-fill"></i>
        <span class="text-[15px] ml-4 text-gray-200 font-bold">Gestion de Stock</span>
      </div>
      <div class="my-4 bg-gray-600 h-[1px]"></div>
      <div
        class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white"
        onclick="dropdown()"
      >
        <i class="bi bi-chat-left-text-fill"></i>
        <div class="flex justify-between w-full items-center">
          <span class="text-[15px] ml-4 text-gray-200 font-bold">Chatbox</span>
          <span class="text-sm rotate-180" id="arrow">
            <i class="bi bi-chevron-down"></i>
          </span>
        </div>
      </div>
      <div
        class="text-left text-sm mt-2 w-4/5 mx-auto text-gray-200 font-bold"
        id="submenu"
      >
        <h1 class="cursor-pointer p-2 hover:bg-blue-600 rounded-md mt-1">
          Social
        </h1>
        <h1 class="cursor-pointer p-2 hover:bg-blue-600 rounded-md mt-1">
          Personal
        </h1>
        <h1 class="cursor-pointer p-2 hover:bg-blue-600 rounded-md mt-1">
          Friends
        </h1>
      </div>
      <div
        class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white"
      >
        <i class="bi bi-box-arrow-in-right"></i>
        <span class="text-[15px] ml-4 text-gray-200 font-bold">Logout</span>
      </div>
      
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
    <div class="container mx-auto p-4 ml-80">
        <h1 class="text-2xl font-bold mb-4">Dashboard</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            <div class="bg-white p-4 rounded shadow">
                <h3 class="text-xl font-semibold mb-2">Produits en stock</h3>
                <ul>
                    <?php foreach ($in_stock as $product) : ?>
                        <li><?php echo $product['name']; ?> (Stock: <?php echo $product['stock']; ?>)</li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="bg-white p-4 rounded shadow">
                <h3 class="text-xl font-semibold mb-2">Produits en rupture de stock</h3>
                <ul>
                    <?php foreach ($out_of_stock as $product) : ?>
                        <li><?php echo $product['name']; ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="bg-white p-4 rounded shadow">
                <h3 class="text-xl font-semibold mb-2">Produits les plus vendus</h3>
                <ul>
                    <?php foreach ($most_sold as $product) : ?>
                        <li><?php echo $product['name']; ?> (Sold: <?php echo $product['sold']; ?>)</li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="bg-white p-4 rounded shadow">
                <h3 class="text-xl font-semibold mb-2">Produits les moins vendus</h3>
                <ul>
                    <?php foreach ($least_sold as $product) : ?>
                        <li><?php echo $product['name']; ?> (Sold: <?php echo $product['sold']; ?>)</li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="bg-white p-4 rounded shadow">
                <h3 class="text-xl font-semibold mb-2">Stocks bas (inférieurs à 10)</h3>
                <ul>
                    <?php foreach ($low_stock as $product) : ?>
                        <li><?php echo $product['name']; ?> (Stock: <?php echo $product['stock']; ?>)</li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
</body>
</html>
