<?php
session_start();
include './db/conn.php';
if (isset($_GET['id'])) {
    $_SESSION['over_id'] = $_GET['id'];
}
$id = $_SESSION['over_id'];
$product = $conn->query("SELECT * FROM products WHERE id = $id");

$data = $product->fetch(PDO::FETCH_OBJ);
$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";

// Get the host name (domain)
$host = $_SERVER['HTTP_HOST'];

// Get the request URI (path and query string)
$requestUri = $_SERVER['REQUEST_URI'];

// Combine to get the full URL
$currentUrl = $protocol . $host . $requestUri;

// Output the current URL
// echo $currentUrl;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <!-- <link rel="icon" type="image/svg+xml" href="./assets/IMG-20230309-WA0008-removebg-preview.jpg" /> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Glowing Valley | <?php echo $data->name; ?></title>

    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <!-- <link rel="apple-touch-icon" sizes="180x180" href="./assets/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="./assets/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./assets/favicon-16x16.png">
    <link rel="manifest" href="./assets/site.webmanifest"> -->

    <meta property="og:title" content="<?php echo $data->name; ?>" />
    <meta property="og:description" content="<?php echo $data->uses; ?>" />
    <meta property="og:image" content="<?php echo './admin/' . $data->image; ?>" />
    <meta property="og:url" content="<?php echo $currentUrl; ?>" />
    <meta property="og:type" content="<?php echo ($data->category == 1) ? "Beauty Product" : "Hamper Product"; ?>" />
</head>

<body class="relative">

    <?php
    include './components/navbar.html';
    include './components/search.php';

    ?>




    <section class="overflow-hidden">
        <div class="mx-auto px-5 py-24">
            <!-- <?php echo './admin/' . $data->image; ?> -->
            <div class="mx-auto flex flex-wrap items-center lg:w-4/5">
                <img class="h-72 w-full rounded-lg object-cover lg:h-96 lg:w-1/2" src="<?php echo './admin/' . $data->image; ?>" />
                <div class="mt-6 w-full lg:mt-0 lg:w-1/2 lg:pl-10">
                    <!-- <h2 class="text-sm font-semibold tracking-widest text-gray-500">
                        <?php echo ($data->category == 1) ? "Beauty Product" : "Hamper Product"  ?>
                    </h2> -->
                    <h1 class="my-4 text-3xl font-semibold text-black border-b border-gray-300 pb-4 "><?php echo $data->name; ?></h1>
                    <!-- <div class="my-4 flex items-center">
                        <span class="flex items-center space-x-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-yellow-500">
                                <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                </polygon>
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-yellow-500">
                                <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                </polygon>
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-yellow-500">
                                <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                </polygon>
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-yellow-500">
                                <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                </polygon>
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-yellow-500">
                                <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                </polygon>
                            </svg>
                            <span class="ml-3 inline-block text-xs font-semibold">
                                4 Reviews
                            </span>
                        </span>
                    </div> -->
                    <h2 class="text-lg font-semibold tracking-tighter">
                        Uses and Benefits
                    </h2>
                    <p class="leading-relaxed">
                    <p><?php echo $data->uses ?></p>
                    </p>
                    <h2 class="text-lg font-bold tracking-tighter pt-4 ">
                        <?php echo ($data->ingre != "") ? "Ingredients" : "" ?>
                    </h2>
                    <p class="leading-relaxed ">
                    <p class="pt-3"><?php echo $data->ingre ?></p>
                    </p>

                    <div class="my-4 border-b border-gray-300 pb-2">
                        <?php
                        $weights = explode(',', $data->weight);
                        if ($weights[0] != null) : ?>
                            <h3 class="text-heading mb-2.5 text-base font-semibold capitalize md:text-lg">
                                Weight
                            </h3>
                        <?php endif; ?>
                        <ul class="colors -mr-3 flex flex-wrap">

                            <?php


                            $prices = explode(',', $data->prices);

                            for ($i = 0; $i < sizeof($weights); $i++):

                                if ($weights[$i] != ""):
                            ?>
                                    <a href="overview.php?id=<?php echo $id;?>&w=<?php echo $weights[$i]; ?>&p=<?php echo $prices[$i]; ?>">
                                        <li class="text-heading mb-2 mr-2 flex h-9 px-4 cursor-pointer items-center justify-center rounded border border-gray-300 p-1 text-xs font-semibold uppercase transition duration-200 ease-in-out hover:border-black md:mb-3 md:mr-3 md:h-11  md:text-sm">
                                            <?php echo $weights[$i] ?>
                                        </li>
                                    </a>
                            <?php endif;
                            endfor;
                            ?>

                        </ul>
                    </div>

                    <div class="flex items-center justify-between py-2">
                        <?php
                        if ($prices[0] != null): ?>

                            <span class="title-font text-2xl font-bold text-gray-900">
                                <?php echo (isset($_GET['p'])) ?  "₹ " . $_GET['p'] : "₹ " . $prices[0];;
                                echo ($data->category == 2) ? " onwards" : "" ?>
                            </span>
                        <?php endif;
                        ?>

                        <?php
                        $productName = $data->name;
                        $whatsappMessage = "I'm interested in this product: $productName , $currentUrl";
                        // echo urlencode($whatsappMessage);
                        $whatsappUrl = "whatsapp://send?phone=+91%20$9422706998&text=" . urlencode($whatsappMessage); ?>

                        <form action="cart.php" method="POST">
                            <input class="hidden" type="text" name="id" value="<?php echo $data->id; ?>">

                            <input class="hidden" type="text" name="weight" value="<?php echo (isset($_GET['w'])) ?  " " . $_GET['w'] : " " . $weights[0]; ?>">
                            <input class="hidden" type="text" name="price" value="<?php echo (isset($_GET['p'])) ?  " " . $_GET['p'] : " " . $prices[0]; ?>">
                            <?php if ($data->category == 1) : ?>
                                <button type="submit" name="cart" class="rounded-md bg-[#041e42] px-3 py-2 text-lg font-semibold text-white shadow-sm hover:bg-[#041e42]/90 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black">
                                    <i class="ri-shopping-cart-line"></i> Add to Cart
                                </button>
                            <?php endif; ?>
                            <a href="<?php echo $whatsappUrl ?>">

                                <button type="button" name="buy" class="rounded-md bg-green-500 px-3 py-2 text-lg font-semibold text-white shadow-sm hover:bg-green-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-green-600">
                                    <i class="ri-whatsapp-line font-thin"></i> Buy Now
                                </button>
                            </a>

                        </form>




                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php
    include './components/footer.html';
    ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js" integrity="sha512-7eHRwcbYkK4d9g/6tD/mhkf++eoTHwpNM9woBxtPUBWm67zeAfFC+HrdoE2GanKeocly/VxeLvIqwvCdk7qScg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="script.js"></script>



</body>

</html>