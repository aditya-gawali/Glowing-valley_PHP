<?php

include './db/conn.php';
session_start();



if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}


// unset($_SESSION['cart']);

if (isset($_POST['cart'])) {
    $product_id = intval($_POST['id']);
    $weight = $_POST['weight'];
    $price = intval($_POST['price']);
    $flag = false;
    foreach ($_SESSION['cart'] as $cart_p) {
        if ($cart_p[0] == $product_id && $cart_p[2] == $weight) {
            $flag = true;
            break;
        }
    }

    if (!$flag) {

        array_push($_SESSION['cart'], array($product_id, $quantity = 1, $weight, $price));
    }
    setcookie('cart', serialize($_SESSION['cart']), time() + (86400 * 30), "/"); // 30 days expiration

}


// unset($_SESSION['cart']);
// print_r($_SESSION['cart']);



$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
if (isset($_GET['d_id'])) {
    // echo "deleted";
    unset($_SESSION['cart'][$_GET['d_id']]);
    header("location:./cart.php");
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <!-- <link rel="icon" type="image/svg+xml" href="./assets/IMG-20230309-WA0008-removebg-preview.jpg" /> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Glowing Valley</title>

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


    <div class="mx-auto flex max-w-3xl flex-col space-y-4 p-6 px-5 sm:p-10 sm:px-2">
        <h2 class="text-3xl font-bold">Your cart</h2>
        <p class="mt-3 text-sm font-medium text-gray-700">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum eius
            repellat ipsam, sit praesentium incidunt.
        </p>
        <ul class="flex flex-col divide-y divide-gray-200">

            <?php
            $total = 0;
            foreach ($cart as $key => $cart_p) :
                $product = $conn->query("SELECT * from products WHERE id = $cart_p[0]");
                $data = $product->fetch(PDO::FETCH_OBJ);
                $total += $cart_p[3];
            ?>
                <li class="flex flex-col py-6 sm:flex-row sm:justify-between">
                    <div class="flex w-full space-x-2 sm:space-x-4">
                        <img class="h-20 w-20 flex-shrink-0 rounded object-contain outline-none dark:border-transparent sm:h-32 sm:w-32" src="./admin/<?php echo $data->image; ?>" alt="Nike Air Force 1 07 LV8" />
                        <div class="flex w-full flex-col justify-between pb-4">
                            <div class="flex w-full justify-between space-x-2 pb-2">
                                <div class="space-y-1">
                                    <h3 class="text-lg font-semibold leading-snug sm:pr-8">
                                        <?php echo $data->name; ?>
                                    </h3>
                                    <p class="text-sm">Weight : <?php echo $cart_p[2]; ?></p>
                                    <!-- <p class="text-sm">Quantity : <?php echo $cart_p[1]; ?></p> -->
                                </div>
                                <div class="text-right">
                                    <p class="text-lg font-semibold">₹ <?php echo $cart_p[3]; ?></p>
                                </div>
                            </div>
                            <a href="cart.php?d_id=<?php echo $key; ?>">
                                <div class="flex divide-x text-sm">
                                    <button type="button" class="flex items-center space-x-2 px-2 py-1 pl-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-trash">
                                            <path d="M3 6h18"></path>
                                            <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"></path>
                                            <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"></path>
                                        </svg>
                                        <span>Remove</span>
                                    </button>
                            </a>

                        </div>
                    </div>
    </div>
    </li>

<?php endforeach; ?>

</ul>
<div class="space-y-1 text-right">
    <p>
        Total amount:<span class="font-semibold"> ₹ <?php echo $total; ?></span>
    </p>
</div>
<div class="flex justify-end space-x-4">
    <a href="shopAll.php">
        <button type="button" class="rounded-md border border-black px-3 py-2 text-sm font-semibold text-black shadow-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black">
            Back to shop
        </button>
    </a>
    <!-- <button type="button" class="rounded-md border border-black px-3 py-2 text-sm font-semibold text-black shadow-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black">
        Checkout
    </button> -->
</div>
</div>


<?php
include './components/footer.html';
?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js" integrity="sha512-7eHRwcbYkK4d9g/6tD/mhkf++eoTHwpNM9woBxtPUBWm67zeAfFC+HrdoE2GanKeocly/VxeLvIqwvCdk7qScg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="script.js"></script>



</body>

</html>