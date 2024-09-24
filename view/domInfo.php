<?php
// Start the session if needed
session_start();
?>

<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>DOM Information</title>
    <!-- Lexend Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Lexend:wght@100..900&display=swap"
      rel="stylesheet"
    />

    <!-- Font Awesome -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
      integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />

    <!-- DaisyUI -->
    <link
      href="https://cdn.jsdelivr.net/npm/daisyui@4.12.10/dist/full.min.css"
      rel="stylesheet"
      type="text/css"
    />
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Tailwind configuration -->
    <script>
      tailwind.config = {
        theme: {
          extend: {
            colors: {
              bg_yellow: "#F9F7F3",
              btn_primary: "#ABEF5F ",
            },
            fontFamily: {
              Lexend: "Lexend",
            },
          },
        },
      };
    </script>
</head>
<body class="font-Lexend bg-white">
    <!-- Header section -->
    <header class="w-full py-10 bg-bg_yellow sticky top-0 z-50">
        <div class="flex justify-evenly">
            <a
                href="./index.php" <!-- Changed to .php for consistency -->
                id="home-btn"
                class="bg-btn_primary px-10 py-3 rounded-lg text-black text-xl font-semibold"
            >
                Home
            </a>
            <div class="flex justify-center items-center gap-3 font-semibold">
                <img src="assets/logo.png" alt="" /><span>Donate Bangladesh</span>
            </div>
            <div class="flex justify-center items-center gap-3 font-semibold">
                <img src="assets/coin.png" alt="" /><span>5500</span> BDT <!-- Ideally, this should be dynamic -->
            </div>
        </div>
    </header>

    <section class="w-10/12 mx-auto bg-bg_white mt-20">
        <h1 class="text-3xl mb-6 pl-2">
            Donate Bangladesh <i class="fa-solid fa-question"></i>
        </h1>
    </section>
</body>
</html>
