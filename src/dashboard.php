<head>
<script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" type="text/css" href="./output.css" />
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
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
        <a href="./accueil.php" id="accueilButton" class="text-[15px] ml-4 text-gray-200 font-bold">
        <div
        class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-[#05B6A1] text-white">Accueil
      </div>
    </a>	
    <a href="./gestionproduits.php" id="gestionButton" class="text-[15px] ml-4 text-gray-200 font-bold">
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
  </body>