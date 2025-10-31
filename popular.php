<?php
include "./db/conn.php";
error_reporting(0);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <!-- <link rel="icon" type="image/svg+xml" href="./assets/IMG-20230309-WA0008-removebg-preview.jpg" /> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Glowing Valley | Popular Now</title>

    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <!-- <link rel="apple-touch-icon" sizes="180x180" href="./assets/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="./assets/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./assets/favicon-16x16.png">
    <link rel="manifest" href="./assets/site.webmanifest"> -->
</head>

<body class="relative">


    <?php
    include './components/navbar.html';
    include './components/search.php';

    ?>



    <div class="py-5 px-5 md:px-20 flex flex-col gap-4 ">
        <h1 class="text-center text-2xl md:text-3xl font-bold py-4">Popular Now</h1>
        <!-- 
        <div class="flex flex-row gap-4 hover:cursor-pointer pb-5 font-bold overflow-x-scroll md:overflow-x-hidden px-4 md:flex-wrap ">

            <div class="rounded-lg text-xl bg-white p-3 px-4 shadow-lg">
                <i class="ri-filter-line"></i>
            </div>
            <div class="rounded-lg text-md md:text-lg bg-white p-3 px-4 shadow-lg text-nowrap">
                <h1>Beauty </h1>
            </div>
            <div class="rounded-lg text-md md:text-lg bg-white p-3 px-4 shadow-lg text-nowrap">
                <h1>Hamper</h1>
            </div>
            <div class="rounded-lg text-md md:text-lg bg-white p-3 px-4 shadow-lg text-nowrap">
                <h1>Popularity</h1>
            </div>

            <div class="rounded-lg text-md md:text-lg bg-white p-3 px-4 shadow-lg text-nowrap">
                <h1>Latest</h1>
            </div>
            <div class="rounded-lg text-md md:text-lg bg-white p-3 px-4 shadow-lg  text-nowrap">
                <h1>Price : Low to High</h1>
            </div>
            <div class="rounded-lg text-md md:text-lg bg-white p-3 px-4 shadow-lg  text-nowrap">
                <h1>Price : High to Low</h1>
            </div>
        </div> -->

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mx-auto">
            <?php
            $product = $conn->query("SELECT * FROM products WHERE popular = 1 ORDER BY `id` DESC");

            $product->execute();

            $data = $product->fetchAll(PDO::FETCH_OBJ);

            foreach ($data as $row) :
            ?>
                <div class="bg-white shadow-md rounded-lg flex flex-col h-full">
                    <div class="h-48 overflow-hidden rounded-t-lg">
                        <a href="./overview.php?id=<?php echo $row->id; ?>">
                            <img src="./admin/<?php echo $row->image; ?>" alt="Product" class="w-full h-full object-cover" />
                        </a>
                    </div>

                    <div class="flex flex-col flex-grow p-4">
                        <h2 class="text-lg font-semibold mb-2"><?php echo $row->name; ?></h2>
                        <p class="text-gray-600 mb-4"><?php echo $row->uses; ?></p>
                        <div class="mt-5 flex items-center space-x-2">
                            <?php $weight = explode(",", $row->weight);
                            foreach ($weight as $w) :
                                if ($w != "") :
                            ?>
                                    <span class="block cursor-pointer rounded-md border border-gray-300 p-1 px-2 text-sm font-medium">
                                        <?php echo $w; ?>
                                    </span>
                            <?php
                                endif;
                            endforeach; ?>
                        </div>
                        <div class="mt-auto">
                            <p class="text-xl font-bold"><?php $price = explode(",", $row->prices);
                                                            echo ($price[0] != "") ? "₹ " . $price[0] : "";
                                                            echo ($row->category == 2) ? " onwards" : ""
                                                            ?></p>
                            <a href="./overview.php?id=<?php echo $row->id; ?>">
                                <button class="mt-2 w-full bg-green-500 text-white py-2 px-4 rounded hover:bg-green-600">
                                    <i class="ri-whatsapp-line"></i> Buy Now
                                </button>
                            </a>
                        </div>
                    </div>
                </div>

            <?php
            endforeach;
            ?>



        </div>
    </div>







    <?php
    include './components/footer.html';
    ?>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js" integrity="sha512-7eHRwcbYkK4d9g/6tD/mhkf++eoTHwpNM9woBxtPUBWm67zeAfFC+HrdoE2GanKeocly/VxeLvIqwvCdk7qScg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="script.js"></script>



</body>

</html>