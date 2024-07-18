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

    if (isset($_POST['delete'])) {
        $id = $_POST['delete_id'];
        $sql = "DELETE FROM medicaments WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        if ($stmt->execute([$id])) {
            echo "<script>alert('Product deleted successfully');</script>";
            echo "<script>window.location.href = window.location.href;</script>"; 
            exit;
        } else {
            echo "<script>alert('Error deleting product');</script>";
        }
    }

    if (isset($_POST['update'])) {
        $id = $_POST['update_id'];
        $name = $_POST['name'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $expire_date = $_POST['expire_date'];
        $form = $_POST['form'];
        $manufacturer = $_POST['manufacturer'];
        $quantity = $_POST['quantity'];
        $sold = $_POST['sold'];
        
        $sql = "UPDATE medicaments SET name = ?, description = ?, price = ?, expire_date = ?, form = ?, manufacturer = ?, quantity = ?, sold = ? WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        if ($stmt->execute([$name, $description, $price, $expire_date, $form, $manufacturer, $quantity, $sold, $id])) {
            echo "<script>alert('Product updated successfully');</script>";
            echo "<script>window.location.href = window.location.href;</script>";
            exit;
        } else {
            echo "<script>alert('Error updating product');</script>";
        }
    }

    if (isset($_POST['add'])) {
        $_id = $_POST['null'];
        $name = $_POST['add_name'];
        $description = $_POST['add_description'];
        $price = $_POST['add_price'];
        $expire_date = $_POST['add_expire_date'];
        $form = $_POST['add_form'];
        $manufacturer = $_POST['add_manufacturer'];
        $quantity = $_POST['add_quantity'];
        $sold = $_POST['add_sold'];
        $img_path = $_POST['add_img_path'];
    
        $sql = "INSERT INTO medicaments (_id ,name, description, price, expire_date, form, manufacturer, quantity, sold, img_path) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        if ($stmt->execute([$_id, $name, $description, $price, $expire_date, $form, $manufacturer, $quantity, $sold, $img_path])) {
            echo "<script>alert('Product added successfully');</script>";
            echo "<script>window.location.href = window.location.href;</script>";
            exit;
        } else {
            echo "<script>alert('Error adding product');</script>";
        }
    }
    

    $sql = "SELECT img_path, name, description, expire_date, form, manufacturer, price, quantity, sold, id FROM medicaments";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    throw new PDOException($e->getMessage(), (int)$e->getCode());
}
?>

<!------------------------------PHP CODE SECTION END------------------------------------>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pharmasys Stock Management</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
        .sidebar {
            z-index: 100;
        }
    </style>
</head>
<body class="relative bg-gray-900 isolate font-poppins">
<div class="absolute inset-x-0 top-4 -z-10 flex transform-gpu justify-center overflow-hidden blur-3xl" aria-hidden="true">
      <div class="aspect-[1108/632] w-full flex-none bg-gradient-to-r from-[#80caff] to-[#4f46e5] opacity-25" style="clip-path: polygon(73.6% 51.7%, 91.7% 11.8%, 100% 46.4%, 97.4% 82.2%, 92.5% 84.9%, 75.7% 64%, 55.3% 47.5%, 46.5% 49.4%, 45% 62.9%, 50.3% 87.2%, 21.3% 64.1%, 0.1% 100%, 5.4% 51.1%, 21.4% 63.9%, 58.9% 0.2%, 73.6% 51.7%)"></div>
    </div>
    <div class="text-center py-2 font-poppins absolute left-0">
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

   
    <!-------------------------------------------------------------------DASHBOARD END ------------------------------------------------------------------------------------>
    <!----------------------------------------------------------------TABLE---------------------------------------------------------------------------------->
    <div class="px-4 sm:px-6 lg:py-4 lg:px-8">
  <div class="sm:flex sm:items-center">
    <div class="sm:flex-auto">
      <h1 class="text-base font-semibold leading-6 text-gray-900">Products</h1>
      <p class="mt-2 pl-8 text-sm text-gray-400">All products displayed below can only be sold with a valid prescription.</p>
    </div>
    <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
      <button id="addbtn" type="button" class="block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-600">Add Product</button>
    </div>
  </div>
  <div class="-mx-4 mt-8 sm:-mx-0">
    <table class="min-w-full divide-y divide-gray-300 bg-gray-50 rounded-lg">
      <thead class="hidden sm:table-header-group">
        <tr>
          <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">Photo</th>
          <th scope="col" class="hidden px-3 py-3.5 text-left text-sm font-semibold text-gray-900 lg:table-cell">Name</th>
          <th scope="col" class="hidden px-3 py-3.5 text-left text-sm font-semibold text-gray-900 sm:table-cell">Description</th>
          <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Price</th>
          <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Expire Date</th>
          <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Form</th>
          <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Manufacturer</th>
          <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Quantity</th>
          <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Sold</th>
          <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-0">
            <span class="sr-only">Actions</span>
          </th>
        </tr>
      </thead>
      <tbody class="divide-y divide-gray-200 bg-white bg-opacity-10 ">
        <?php
        if (!empty($result)) {
            foreach ($result as $row) {
                echo "<tr>";
                echo "<td class='w-full max-w-full py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:w-auto sm:max-w-none sm:pl-0'>";
                echo "<img src='" . $row["img_path"] . "' class='w-16 md:w-32 max-w-full max-h-full' alt='Product Image'>";
                echo "<dl class='font-normal lg:hidden'>";
                echo "<dt class='sr-only'>Name</dt>";
                echo "<dd class='mt-1 truncate text-gray-700'>" . $row["name"] . "</dd>";
                echo "<dt class='sr-only sm:hidden'>Description</dt>";
                echo "<dd class='mt-1 truncate text-gray-500 sm:hidden'>" . $row["description"] . "</dd>";
                echo "<dt class='sr-only sm:hidden'>Price</dt>";
                echo "<dd class='mt-1 truncate text-gray-500 sm:hidden'>$" . $row["price"] . "</dd>";
                echo "<dt class='sr-only sm:hidden'>Expire Date</dt>";
                echo "<dd class='mt-1 truncate text-gray-500 sm:hidden'>" . $row["expire_date"] . "</dd>";
                echo "<dt class='sr-only md:hidden'>Form</dt>";
                echo "<dd class='mt-1 truncate text-gray-500 sm:hidden'>" . $row["form"] . "</dd>";
                echo "<dt class='sr-only sm:hidden'>Manufacturer</dt>";
                echo "<dd class='mt-1 truncate text-gray-500 sm:hidden'>" . $row["manufacturer"] . "</dd>";
                echo "<dt class='sr-only sm:hidden'>Quantity</dt>";
                echo "<dd class='mt-1 truncate text-gray-500 sm:hidden'>" . $row["quantity"] . "</dd>";
                echo "<dt class='sr-only sm:hidden'>Sold</dt>";
                echo "<dd class='mt-1 truncate text-gray-500 sm:hidden'>" . $row["sold"] . "</dd>";
                echo "</dl>";
                echo "</td>";
                echo "<td class='hidden px-3 py-4 text-sm text-gray-500 lg:table-cell'>" . $row["name"] . "</td>";
                echo "<td class='hidden px-3 py-4 text-sm text-gray-500 lg:table-cell'>" . $row["description"] . "</td>";
                echo "<td class='hidden px-3 py-4 text-sm text-gray-500 lg:table-cell'>$" . $row["price"] . "</td>";
                echo "<td class='hidden px-3 py-4 text-sm text-gray-500 lg:table-cell'>" . $row["expire_date"] . "</td>";
                echo "<td class='hidden px-3 py-4 text-sm text-gray-500 lg:table-cell'>" . $row["form"] . "</td>";
                echo "<td class='hidden px-3 py-4 text-sm text-gray-500 lg:table-cell'>" . $row["manufacturer"] . "</td>";
                echo "<td class='hidden px-3 py-4 text-sm text-gray-500 lg:table-cell'>" . $row["quantity"] . "</td>";
                echo "<td class='hidden px-3 py-4 text-sm text-gray-500 lg:table-cell'>" . $row["sold"] . "</td>";
                echo "<td class='py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-0'>";
                echo "<form method='post' action='' class='inline'>";
                echo "<input type='hidden' name='delete_id' value='" . $row["id"] . "'>";
                echo "<button type='submit' name='delete' class='text-red-600 hover:text-red-900'>Remove</button>";
                echo "</form>";
                echo "<button type='button' class='ml-2 text-indigo-600 hover:text-indigo-900' onclick='showEditForm(" . json_encode($row) . ")'>Modify</button>";
                echo "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='10' class='px-6 py-4 text-center font-semibold text-gray-900'>No data found</td></tr>";
        }
        ?>
      </tbody>
    </table>
  </div>
</div>


<!-------------------------------------------------------------------TABLE END ------------------------------------------------------------------------------------>
<!-------------------------------------------------------------------ADD FORM------------------------------------------------------------------------------------>
<div id="add-form-container" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 flex justify-center items-center">
    <form method="post" action="" class="bg-white p-6 rounded-lg w-full md:w-[50%]">
        <div class="mb-4">
            <label for="add_name" class="block text-gray-700">Name</label>
            <input type="text" name="add_name" id="add_name" class="w-full p-2 border border-gray-300 rounded mt-1">
        </div>
        <div class="mb-4">
            <label for="add_description" class="block text-gray-700">Description</label>
            <textarea name="add_description" id="add_description" class="w-full p-2 border border-gray-300 rounded mt-1"></textarea>
        </div>
        <div class="mb-4">
            <label for="add_price" class="block text-gray-700">Price</label>
            <input type="text" name="add_price" id="add_price" class="w-full p-2 border border-gray-300 rounded mt-1">
        </div>
        <div class="mb-4">
            <label for="add_expire_date" class="block text-gray-700">Expire Date</label>
            <input type="date" name="add_expire_date" id="add_expire_date" class="w-full p-2 border border-gray-300 rounded mt-1">
        </div>
        <div class="mb-4">
            <label for="add_form" class="block text-gray-700">Form</label>
            <input type="text" name="add_form" id="add_form" class="w-full p-2 border border-gray-300 rounded mt-1">
        </div>
        <div class="mb-4">
            <label for="add_manufacturer" class="block text-gray-700">Manufacturer</label>
            <input type="text" name="add_manufacturer" id="add_manufacturer" class="w-full p-2 border border-gray-300 rounded mt-1">
        </div>
        <div class="mb-4">
            <label for="add_quantity" class="block text-gray-700">Quantity</label>
            <input type="text" name="add_quantity" id="add_quantity" class="w-full p-2 border border-gray-300 rounded mt-1">
        </div>
        <div class="mb-4">
            <label for="add_sold" class="block text-gray-700">Sold</label>
            <input type="text" name="add_sold" id="add_sold" class="w-full p-2 border border-gray-300 rounded mt-1">
        </div>
        <div class="mb-4">
            <label for="add_img_path" class="block text-gray-700">Image Path</label>
            <input type="text" name="add_img_path" id="add_img_path" class="w-full p-2 border border-gray-300 rounded mt-1">
        </div>
        <button type="submit" name="add" class="bg-blue-500 text-white p-2 rounded">Add Product</button>
        <button type="button" class="bg-gray-500 text-white p-2 rounded" onclick="hideAddForm()">Cancel</button>
    </form>
</div>
<!-------------------------------------------------------------------ADD FORM END------------------------------------------------------------------------------------>

<!-------------------------------------------------------------------EDIT FORM------------------------------------------------------------------------------------>
    <div id="edit-form-container" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 flex justify-center items-center">
        <form method="post" action="" class="bg-white p-6 rounded-lg w-full md:w-[50%]">
            <input type="hidden" name="update_id" id="update_id">
            <div class="mb-4">
                <label for="name" class="block text-gray-700">Name</label>
                <input type="text" name="name" id="edit_name" class="w-full p-2 border border-gray-300 rounded mt-1">
            </div>
            <div class="mb-4">
                <label for="description" class="block text-gray-700">Description</label>
                <textarea name="description" id="edit_description" class="w-full p-2 border border-gray-300 rounded mt-1"></textarea>
            </div>
            <div class="mb-4">
                <label for="price" class="block text-gray-700">Price</label>
                <input type="text" name="price" id="edit_price" class="w-full p-2 border border-gray-300 rounded mt-1">
            </div>
            <div class="mb-4">
                <label for="expire_date" class="block text-gray-700">Expire Date</label>
                <input type="date" name="expire_date" id="edit_expire_date" class="w-full p-2 border border-gray-300 rounded mt-1">
            </div>
            <div class="mb-4">
                <label for="form" class="block text-gray-700">Form</label>
                <input type="text" name="form" id="edit_form" class="w-full p-2 border border-gray-300 rounded mt-1">
            </div>
            <div class="mb-4">
                <label for="manufacturer" class="block text-gray-700">Manufacturer</label>
                <input type="text" name="manufacturer" id="edit_manufacturer" class="w-full p-2 border border-gray-300 rounded mt-1">
            </div>
            <div class="mb-4">
                <label for="quantity" class="block text-gray-700">Quantity</label>
                <input type="text" name="quantity" id="edit_quantity" class="w-full p-2 border border-gray-300 rounded mt-1">
            </div>
            <div class="mb-4">
                <label for="sold" class="block text-gray-700">Sold</label>
                <input type="text" name="sold" id="edit_sold" class="w-full p-2 border border-gray-300 rounded mt-1">
            </div>
            <button type="submit" name="update" class="bg-blue-500 text-white p-2 rounded">Save</button>
            <button type="button" class="bg-gray-500 text-white p-2 rounded" onclick="hideEditForm()">Cancel</button>
        </form>
    </div>
<!-------------------------------------------------------------------EDIT FORM END------------------------------------------------------------------------------------>

    <script>
        document.getElementById('drawer-button').addEventListener('click', function() {
            document.getElementById('drawer-navigation').classList.toggle('-translate-x-full');
        });

        document.getElementById('close-drawer').addEventListener('click', function() {
            document.getElementById('drawer-navigation').classList.add('-translate-x-full');
        });

        document.getElementById('addbtn').addEventListener('click', function() {
            document.getElementById('add-form-container').classList.remove('hidden');
        });

        function hideAddForm() {
            document.getElementById('add-form-container').classList.add('hidden');
        }

        function showEditForm(data) {
            document.getElementById('update_id').value = data.id;
            document.getElementById('edit_name').value = data.name;
            document.getElementById('edit_description').value = data.description;
            document.getElementById('edit_price').value = data.price;
            document.getElementById('edit_expire_date').value = data.expire_date;
            document.getElementById('edit_form').value = data.form;
            document.getElementById('edit_manufacturer').value = data.manufacturer;
            document.getElementById('edit_quantity').value = data.quantity;
            document.getElementById('edit_sold').value = data.sold;
            document.getElementById('edit-form-container').classList.remove('hidden');
        }

        function hideEditForm() {
            document.getElementById('edit-form-container').classList.add('hidden');
        }
    </script>
</body>
</html>
