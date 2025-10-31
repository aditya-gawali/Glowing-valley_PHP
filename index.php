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
    <title>Glowing Valley</title>

    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <link rel="stylesheet" href="style.css">

</head>

<body class="relative">

    <?php
    include './components/navbar.html';
    include './components/search.php';
    ?>


    <div id="hero" class="w-full h-[30vh] lg:h-screen ">

        <div class="mx-5 md:mx-20 my-5 h-[80%] border rounded-lg overflow-hidden shadow-xl">


            <div class="swiper w-full h-full">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <img src="./assets/images/hero-2.png" alt="" class="w-full object-cover h-full">
                    </div>
                    <div class="swiper-slide">
                        <img src="./assets/images/hero-2.1.png" alt="" class="w-full object-cover h-full">
                    </div>
                    <div class="swiper-slide">
                        <!-- <img src="./assets/images/hero3.jpeg" alt="" class="w-full object-cover h-full"> -->
                        <video src="./assets/images/hamper video.mp4" autoplay loop muted class="w-full object-cover h-full"></video>
                    </div>

                </div>


                <div class="swiper-scrollbar"></div>
            </div>
        </div>
    </div>

    <div class="px-5 md:px-20 flex flex-col gap-4 ">
        <h1 class="text-center text-2xl md:text-3xl font-bold py-4">Popular Now</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mx-auto">

            <?php
            $product = $conn->query("SELECT * FROM products WHERE popular = 1 ORDER BY `id` DESC LIMIT 4");

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


            <?php endforeach; ?>

        </div>
    </div>


    <div class="py-5 px-5 md:px-20 flex flex-col gap-4  overflow-hidden">
        <div class="flex items-center justify-center py-4 hover:cursor-pointer">
            <h1 class="text-center text-xl md:text-2xl font-bold p-2 rounded-l-xl bg-[#041e42] text-white" id="btab">
                Beauty</h1>
            <h1 class="text-center text-xl md:text-2xl font-bold p-2 rounded-r-xl" id="htab">Hamper</h1>
        </div>

        <div class="tabs w-full h-full">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
                <!-- Slides -->
                <div class="swiper-slide">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mx-auto">
                        <?php
                        $product = $conn->query("SELECT * FROM products WHERE category = 1 ORDER BY `id` DESC LIMIT 8");

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
                <div class="swiper-slide">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mx-auto">
                        <?php
                        $product = $conn->query("SELECT * FROM products WHERE category = 2 ORDER BY `id` DESC LIMIT 8");

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

            </div>

            <!-- <div class="swiper-button-prev"></div> -->
            <!-- <div class="swiper-button-next"></div> -->

        </div>

    </div>

    <div class="py-10 px-5 md:px-20 flex flex-col gap-4">
        <h1 class="text-center w-full text-xl md:text-3xl font-bold py-4">The Great Crate</h1>
        <div class="grid grid-flow-row grid-cols-1">

            <div class="flex flex-col gap-4 rounded-lg overflow-hidden">
                <video src="./assets/images/hamper video.mp4" autoplay loop muted class=""></video>
            </div>

        </div>
    </div>

    <?php
    include './components/founder.html';
    include './components/footer.html';
    ?>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js" integrity="sha512-7eHRwcbYkK4d9g/6tD/mhkf++eoTHwpNM9woBxtPUBWm67zeAfFC+HrdoE2GanKeocly/VxeLvIqwvCdk7qScg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="script.js"></script>



</body>

</html>