<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-4">
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
