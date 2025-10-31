<?php

session_start();
error_reporting(0);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <!-- <link rel="icon" type="image/svg+xml" href="./assets/IMG-20230309-WA0008-removebg-preview.jpg" /> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Glowing Valley | Contact Us</title>

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

    <div class="mx-auto max-w-7xl px-4">
        <div class="mx-auto max-w-7xl py-12 md:py-24">
            <div class="grid items-center justify-items-center gap-x-4 gap-y-10 lg:grid-cols-2">
                <div class="flex items-center justify-center">
                    <div class="px-2 md:px-12">
                        <p class="text-2xl font-bold text-gray-900 md:text-4xl">
                            Get in touch
                        </p>
                        <p class="mt-4 text-lg text-gray-600">
                            Our friendly team would love to hear from you.
                        </p>
                        <?php
                        if ($_SESSION['contact'] == true) : ?>
                            <!-- <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between"> -->
                            <p class="mt-4 text-lg text-gray-600">
                                Message sent Successfully..
                            </p>
                        <?php endif;
                        $_SESSION['contact'] = false;
                        ?>


                        <!-- </div> -->
                        <!-- <form action="admin/db/insert.php" method="POST" id="myForm" class="mt-8 space-y-4"> -->
                        <form id="myForm" class="mt-8 space-y-4">
                            <div class="grid w-full gap-y-4 md:gap-x-4 lg:grid-cols-2">
                                <div class="grid w-full  items-center gap-1.5">
                                    <label class="text-sm font-medium leading-none text-gray-700 peer-disabled:cursor-not-allowed peer-disabled:opacity-70" for="first_name">
                                        First Name
                                    </label>
                                    <input class="flex h-10 w-full  rounded-md border border-gray-300 bg-transparent px-3 py-2 text-sm placeholder:text-gray-400 focus:outline-none focus:ring-1 focus:ring-gray-400 focus:ring-offset-1 disabled:cursor-not-allowed disabled:opacity-50 " type="text" id="first_name" name="first_name" placeholder="First Name" />
                                </div>
                                <div class="grid w-full  items-center gap-1.5">
                                    <label class="text-sm font-medium leading-none text-gray-700 peer-disabled:cursor-not-allowed peer-disabled:opacity-70" for="last_name">
                                        Last Name
                                    </label>
                                    <input class="flex h-10 w-full rounded-md border border-gray-300 bg-transparent px-3 py-2 text-sm placeholder:text-gray-400 focus:outline-none focus:ring-1 focus:ring-gray-400 focus:ring-offset-1 disabled:cursor-not-allowed disabled:opacity-50 " type="text" id="last_name" name="last_name" placeholder="Last Name" />
                                </div>
                            </div>
                            <div class="grid w-full  items-center gap-1.5">
                                <label class="text-sm font-medium leading-none text-gray-700 peer-disabled:cursor-not-allowed peer-disabled:opacity-70" for="email">
                                    Email
                                </label>
                                <input class="flex h-10 w-full rounded-md border border-gray-300 bg-transparent px-3 py-2 text-sm placeholder:text-gray-400 focus:outline-none focus:ring-1 focus:ring-gray-400 focus:ring-offset-1 disabled:cursor-not-allowed disabled:opacity-50 " type="email" id="email" name="email" placeholder="Email" />
                            </div>
                            <div class="grid w-full  items-center gap-1.5">
                                <label class="text-sm font-medium leading-none text-gray-700 peer-disabled:cursor-not-allowed peer-disabled:opacity-70" for="phone_number">
                                    Phone number
                                </label>
                                <input class="flex h-10 w-full rounded-md border border-gray-300 bg-transparent px-3 py-2 text-sm placeholder:text-gray-400 focus:outline-none focus:ring-1 focus:ring-gray-400 focus:ring-offset-1 disabled:cursor-not-allowed disabled:opacity-50 " type="tel" id="phone_number" maxlength="10" minlength="10" name="phone_number" placeholder="Phone number" />
                            </div>

                            <button type="submit" name="contact" class="w-full rounded-md bg-[#041e42] px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-[#041e42]/90 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black">
                                Send Message
                            </button>
                        </form>
                    </div>
                </div>
                <img alt="Contact us" class="hidden max-h-full w-full rounded-lg object-cover lg:block" src="https://images.unsplash.com/photo-1543269664-56d93c1b41a6?ixlib=rb-4.0.3&amp;ixid=MnwxMjA3fDB8MHxzZWFyY2h8MzZ8fGhhcHB5JTIwcGVvcGxlfGVufDB8fDB8fA%3D%3D&amp;auto=format&amp;fit=crop&amp;w=800&amp;q=60" />
            </div>
        </div>
    </div>
    <div class="rounded-lg bg-gray-100">
        <div class="mx-auto max-w-4xl px-4 sm:px-6 lg:px-8">
            <div class="py-20">
                <div class="grid grid-cols-1 gap-x-20 gap-y-8 lg:grid-cols-2">
                    <div class="space-y-4">
                        <p class="w-full text-4xl font-bold text-gray-900">Our Offices</p>
                        <p class="w-full text-lg text-gray-600">
                            Find us at these locations.
                        </p>
                    </div>
                    <div class="space-y-4 divide-y-2">
                        <div class="flex flex-col space-y-2 pt-4 first:pt-0 lg:w-full">
                            <p class="w-full text-xl font-semibold  text-gray-900">
                                Head office
                            </p>
                            <p class="w-full text-base  text-gray-600">Mon-Sat 9am to 5pm.</p>
                            <p class="text-sm font-semibold text-gray-600">
                                Address Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum, commodi!
                            </p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    include './components/footer.html';
    ?>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js" integrity="sha512-7eHRwcbYkK4d9g/6tD/mhkf++eoTHwpNM9woBxtPUBWm67zeAfFC+HrdoE2GanKeocly/VxeLvIqwvCdk7qScg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="script.js"></script>


    <script>
        document.getElementById('myForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent default form submission

            // Create a FormData object
            const formData = new FormData(this); // 'this' refers to the form element

            // Send the form data using fetch
            fetch('db/insert.php', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.text()) // You can expect 'text' or 'json' depending on the PHP response
                .then(data => {
                    // Handle the response from PHP
                    console.log(data);
                    alert("Request Sent Successfully");

                    document.getElementById('myForm').reset();


                    // document.getElementById('result').innerHTML = data; // Display the response
                })
                .catch(error => console.error('Error:', error));
        });


       
    </script>
</body>

</html>