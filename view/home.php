<?php
// Starting session to handle login or donation sessions
session_start();

// Sample data initialization (In real applications, fetch from database)
$noakhaliBalance = 0.00;
$feniBalance = 0.00;
$movementBalance = 0.00;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['donate_noakhali'])) {
        $noakhaliBalance += (int)$_POST['noakhali_amount'];
    } elseif (isset($_POST['donate_feni'])) {
        $feniBalance += (int)$_POST['feni_amount'];
    } elseif (isset($_POST['donate_movement'])) {
        $movementBalance += (int)$_POST['movement_amount'];
    }
}
?>

<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Donate Bangladesh</title>

    <!-- Lexend Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@100..900&display=swap" rel="stylesheet" />

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
          integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
          crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- DaisyUI -->
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.10/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Tailwind configuration -->
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        btn_red: "#da373d",
                        btn_primary: "#ABEF5F ",
                        btn_bg_clr: "#d4f6ae",
                        bg_white: "#FFFFFF",
                        bg_pink: "#E7C1D3",
                        bg_yellow: "#F9F7F3",
                        bg_gray: "#1111110D",
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
            <button class="bg-btn_primary px-10 py-3 rounded-lg text-black text-xl font-semibold">Blog</button>
            <div class="flex justify-center items-center gap-3 font-semibold ">
                <img src="assets/logo.png" alt="" /><span>Donate Bangladesh</span>
            </div>
            <div class="flex justify-center items-center gap-3 font-semibold">
                <img src="assets/coin.png" alt="" /><span>5500</span> BDT
            </div>
        </div>
    </header>

    <!-- Main section -->
    <main class="w-10/12 mx-auto bg-bg_white mt-20">
        <!-- Donation buttons -->
        <!-- <div class="text-center gap-11 sticky top-16 z-40">
            <button class="border border-gray-500 bg-btn_primary px-10 py-3 rounded-lg text-black text-xl font-semibold">Donation</button>
            <button class="border border-gray-500 bg-btn_primary px-10 py-3 rounded-lg text-black text-xl font-semibold">History</button>
        </div> -->

        <!--1st Card: Noakhali Section -->
        <div class="hero border border-gray-300 rounded-xl mt-11">
            <div class="hero-content flex-col lg:flex-row">
                <img src="assets/noakhali.png" alt="" />
                <div>
                    <div class="bg-bg_gray rounded-lg px-4 py-2 w-36 flex items-center mb-4">
                        <img src="assets/coin.png" alt="" />
                        <p class="font-semibold"><span id="noakhaliBlance" class="px-2"><?php echo $noakhaliBalance; ?></span> BDT</p>
                    </div>
                    <h1 class="text-3xl font-bold">Donate for Flood at Noakhali, Bangladesh</h1>
                    <p class="py-6 text-xl text-gray-400">
                        The recent floods in Noakhali have caused significant damage. Your donation will help provide essential supplies.
                    </p>
                    <form method="post">
                        <input type="text" name="noakhali_amount" placeholder="Type here" class="input input-bordered w-full mb-4" />
                        <button type="submit" name="donate_noakhali" class="w-full bg-btn_primary px-10 py-3 rounded-lg font-semibold">Donate Now</button>
                    </form>
                </div>
            </div>
        </div>

        <!--2nd Card: Feni Section -->
        <div class="hero border border-gray-300 rounded-xl mt-11">
            <div class="hero-content flex-col lg:flex-row">
                <img src="assets/feni.png" alt="" />
                <div>
                    <div class="bg-bg_gray rounded-lg px-4 py-2 w-36 flex items-center mb-4">
                        <img src="assets/coin.png" alt="" />
                        <p class="font-semibold"><span id="feniBalance" class="px-2"><?php echo $feniBalance; ?></span> BDT</p>
                    </div>
                    <h1 class="text-3xl font-bold">Donate for Flood Relief in Feni, Bangladesh</h1>
                    <p class="py-6 text-xl text-gray-400">The recent floods in Feni have devastated local communities. Your generous donation will help provide immediate aid.</p>
                    <form method="post">
                        <input type="text" name="feni_amount" placeholder="Write Donation Amount" class="input input-bordered w-full mb-4" />
                        <button type="submit" name="donate_feni" class="w-full bg-btn_primary px-10 py-3 rounded-lg font-semibold">Donate Now</button>
                    </form>
                </div>
            </div>
        </div>

        <!--3rd Card: Quota Movement Section -->
        <div class="hero border border-gray-300 rounded-xl mt-11 mb-24">
            <div class="hero-content flex-col lg:flex-row">
                <img src="assets/quota-protest.png" alt="" />
                <div>
                    <div class="bg-bg_gray rounded-lg px-4 py-2 w-36 flex items-center mb-4">
                        <img src="assets/coin.png" alt="" />
                        <p class="font-semibold"><span id="movementBalance" class=" px-2"><?php echo $movementBalance; ?></span> BDT</p>
                    </div>
                    <h1 class="text-3xl font-bold">Aid for Injured in the Quota Movement</h1>
                    <p class="py-6 text-xl text-gray-400">The recent Quota movement has resulted in numerous injuries. Your support is crucial in providing medical assistance.</p>
                    <form method="post">
                        <input type="text" name="movement_amount" placeholder="Write Donation Amount" class="input input-bordered w-full mb-4" />
                        <button type="submit" name="donate_movement" class="w-full bg-btn_primary px-10 py-3 rounded-lg font-semibold">Donate Now</button>
                    </form>
                </div>
            </div>
        </div>
    </main>


      <!-- Exit button -->
    <div class="exit-button-container flex justify-center pb-6">
        <a href="dashboard.php" class="exit-button">
            <button class=" bg-btn_red px-10 py-3 rounded-lg text-white text-xl font-semibold">Exit</button>
        </a>
    </div>


    <script src="js/donate.js"></script>
</body>
</html>
