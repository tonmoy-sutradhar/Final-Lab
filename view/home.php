<?php
// Start the session
session_start();

// If you're using a database, you can connect to it here
// include('db_connection.php');

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and process the donation data here
    $donationAmount = $_POST['donation_amount']; // Example field from your form
    // Save this data to the database or perform actions
}

// Sample data for balances (this would typically come from a database)
$noakhaliBalance = 200;
$feniBalance = 600;
$movementBalance = 2400;
?>

<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Donate Bangladesh</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@100..900&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.10/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        clifford: "#da373d",
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
<header class="w-full py-5 bg-bg_yellow sticky top-0 z-50 bg-opacity-90">
    <div class="flex justify-evenly">
        <button id="blog-btn" class="bg-btn_primary px-10 py-3 rounded-lg text-black text-xl font-semibold">
            Blog
        </button>
        <div class="flex justify-center items-center gap-3 font-semibold">
            <img src="assets/logo.png" alt="" /><span>Donate Bangladesh</span>
        </div>
        <div class="flex justify-center items-center gap-3 font-semibold">
            <img src="assets/coin.png" alt="" /><span id="navbar-balance">5500</span> BDT
        </div>
    </div>
</header>

<main class="w-10/12 mx-auto bg-bg_white mt-12">
    <div class="text-center mt-6 gap-11 fixed top-20 left-1/2 transform -translate-x-1/2 z-50">
        <button id="donate-show-btn" class="border-2 border-gray-500 bg-btn_primary px-10 py-3 rounded-lg text-black text-xl font-semibold">
            Donation
        </button>
        <button id="history-show-btn" class="border-2 border-gray-500 bg-gray-300 px-10 py-3 rounded-lg text-black text-xl font-semibold">
            History
        </button>
    </div>

    <div id="donate-form" class="mt-28">
        <!--1st Card Noakhali section -->
        <div class="hero border border-gray-300 rounded-xl mt-11">
            <div class="hero-content flex-col lg:flex-row">
                <img src="assets/noakhali.png" alt="" />
                <div>
                    <div class="bg-bg_gray rounded-lg px-4 py-2 w-28 flex items-center mb-4">
                        <img src="assets/coin.png" alt="" />
                        <p class="font-semibold"><span id="noakhaliBlance" class="px-2"><?= $noakhaliBalance ?></span>BDT</p>
                    </div>
                    <h1 class="text-3xl font-bold">Donate for Flood at Noakhali, Bangladesh</h1>
                    <p class="py-6 text-xl text-gray-400">The recent floods in Noakhali have caused significant damage to homes infrastructure. Your donation will help provide essential supplies and to those affected by this disaster. Every contribution, big or small, makes difference. Please join us in supporting the relief efforts and making a positive impact on the lives of those in need.</p>
                    <form method="POST">
                        <input id="inputFieldNokhaili" name="donation_amount" type="text" placeholder="Type here" class="input input-bordered w-full mb-4" />
                        <button id="donateNokhai-btn" class="w-full bg-btn_primary px-10 py-3 rounded-lg font-semibold" type="submit">Donate Now</button>
                    </form>
                </div>
            </div>
        </div>

        <!--2nd Card section -->
        <div class="hero border border-gray-300 rounded-xl mt-11">
            <div class="hero-content flex-col lg:flex-row">
                <img src="assets/feni.png" alt="" />
                <div>
                    <div class="bg-bg_gray rounded-lg px-4 py-2 w-36 flex items-center mb-4">
                        <img src="assets/coin.png" alt="" />
                        <p class="font-semibold"><span id="feniBalance" class="px-2"><?= $feniBalance ?></span>BDT</p>
                    </div>
                    <h1 class="text-3xl font-bold">Donate for Flood Relief in Feni,Bangladesh</h1>
                    <p class="py-6 text-xl text-gray-400">The recent floods in Feni have devastated local communities, leading to severe disruption and loss. Your generous donation will help provide immediate aid, including food, clean water, and medical supplies, to those affected by this calamity. Together, we can offer crucial support and help rebuild lives in the aftermath of this disaster. Every contribution counts towards making a real difference. Please consider donating today to assist those in urgent need.</p>
                    <form method="POST">
                        <input id="feniInputField" name="donation_amount" type="text" placeholder="Write Donation Amount" class="input input-bordered w-full mb-4" />
                        <button id="feniDonate-btn" class="w-full bg-btn_primary px-10 py-3 rounded-lg font-semibold" type="submit">Donate Now</button>
                    </form>
                </div>
            </div>
        </div>

        <!--3rd Card section -->
        <div class="hero border border-gray-300 rounded-xl mt-11 mb-24">
            <div class="hero-content flex-col lg:flex-row">
                <img src="assets/quota-protest.png" alt="" />
                <div>
                    <div class="bg-bg_gray rounded-lg px-4 py-2 w-36 flex items-center mb-4">
                        <img src="assets/coin.png" alt="" />
                        <p class="font-semibold"><span id="movementBalance" class="px-2"><?= $movementBalance ?></span>BDT</p>
                    </div>
                    <h1 class="text-3xl font-bold">Aid for Injured in the Quota Movement</h1>
                    <p class="py-6 text-xl text-gray-400">The recent Quota movement has resulted in numerous injuries and significant hardship for many individuals. Your support is crucial in providing medical assistance, rehabilitation, and necessary supplies to those affected. By contributing, you help ensure that injured individuals receive the care and support they need during this challenging time. Every donation plays a vital role in alleviating their suffering and aiding in their recovery. Please consider making a donation to support these brave individuals in their time of need.</p>
                    <form method="POST">
                        <input id="movementInputFiled" name="donation_amount" type="text" placeholder="Write Donation Amount" class="input input-bordered w-full mb-4" />
                        <button id="movementDoante-btn" class="w-full bg-btn_primary px-10 py-3 rounded-lg font-semibold" type="submit">Donate Now</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div id="history-form" class="hidden mt-28">
        <div class="border border-gray-300 rounded-xl mt-11 text-center"></div>
        <div id="Donate-history" class="text-2xl font-bold text-center border-4 border-spacing-16 border-green-300 rounded-xl py-3">
            <h1 class="text-center text-2xl text-violet-800 border-y-violet-900 border-4 rounded-xl mb-5">Record history of Donation.</h1>
        </div>
    </div>
</main>

<dialog id="my_modal_5" class="modal modal-bottom sm:modal-middle">
    <div class="modal-box text-center">
        <h3 class="text-3xl font-bold">Congrats!</h3>
        <img class="pl-52" src="assets/coin.png" alt="" />
        <p class="py-4">You Have Donated for Humankind</p>
        <h1>Successfully</h1>
        <div class="modal-action">
            <form method="dialog ">
                <button class="btn mr-40">Close confirmation</button>
            </form>
        </div>
    </div>
</dialog>

<script src="JS/donate.js"></script>
<script src="JS/btn-features.js"></script>
<script src="JS/domInfo.js"></script>
</body>
</html>
