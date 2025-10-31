<?php

require 'db/conn.php';

$query = $conn->query("SELECT * FROM products");
$products = $query->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search </title>
</head>

<body>

    <div class='hidden fixed flex w-full h-full z-50 top-0 bg-[#101010] bg-opacity-80 backdrop-blur-sm flex-col gap-6 px-10 py-5 mb-10 overflow-y-auto'
        id='search-div'>
        <div class='flex justify-between text-lg font-bold'>
            <h1></h1>
            <i class="ri-close-line hover:cursor-pointer font-bold text-[#041e42] text-2xl text-white" id="searchcross"></i>
        </div>
        <div class="py-0 md:py-2 top-0 z-40 mx-0 md:mx-10 rounded-none md:rounded-xl">
            <nav class="flex item-center justify-between py-1 px-6 md:px-6 shadow-xl bg-white text-black rounded-lg gap-4   ">
                <!-- <nav class="flex item-center justify-between px-20 py-4 shadow-lg bg-opacity-80 top-0 z-50 bg-white w-full sticky"> -->
                <div class=" flex items-center gap-6 text-xl font-bold">
                    <i class="ri-search-line hover:cursor-pointer" id="search"></i>
                </div>
                <div class="flex items-center gap-4 w-full">
                    <input class="w-full py-3 text-xl focus:outline-none" type="text" id="searchQuery" placeholder="Search for products...">
                </div>
            </nav>
            <div class="flex flex-col item-center justify-between my-3 py-4 shadow-xl bg-white text-black rounded-lg gap-4" id="searchResults">
                <a>
                    <div class="border-black px-6 text-xl"></div>
                </a>
            </div>

        </div>
    </div>



    <script>
        // Pass the PHP product array to JavaScript
        let products = <?php echo json_encode($products); ?>;
        products.forEach(element => {
            // console.log(element);
        });
    </script>

    <script>
        document.getElementById('searchQuery').addEventListener('input', function() {
            let query = this.value.toLowerCase();
            let results = '';

            // Filter products array based on the search query
            products.forEach(function(product) {
                if (product.name.toLowerCase().includes(query) || product.uses.toLowerCase().includes(query) || product.ingre.toLowerCase().includes(query)) {
                    results += `
                       <a href="overview.php?id=${product.id}">
                    <div class="border-b border-black px-6 text-xl">${product.name}</div>
                </a>
                `;
                }
            });

            // Display the filtered results
            document.getElementById('searchResults').innerHTML = results || '<div class="border-black px-6 text-xl">No Product Found</div>';
        });
    </script>

</body>

</html>