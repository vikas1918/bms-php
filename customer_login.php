<?php
ob_start();
session_start();
if (isset($_SESSION['customer_login'])) {

    header('location:customer_profile.php');
}


?>
<html>

<head>
    <title>Login Page</title>

    <link rel="stylesheet" type="text/css" href="css/customer_login.css" />

</head>

<body>

    <?php include 'header.php' ?>
    <div class="h-screen flex justify-center items-center bg-gray-200">
        <form class="p-10 bg-white rounded-xl drop-shadow-lg space-y-5" method="POST">
            <h2 class="text-center text-2xl text-sky-900">
                Customer Login
            </h2>
            <div class="flex flex-col space-y-2">
                <label class="text-sm font-light">Customer ID</label>
                <input class="w-96 px-3 py-2 rounded-md border border-slate-400" type="text" placeholder="Your ID" name="customer_id" required>
            </div>
            <div class="flex flex-col space-y-2">
                <label class="text-sm font-light" for="password">Password</label>
                <input class="w-96 px-3 py-2 rounded-md border border-slate-400" type="password" placeholder="Your Password" name="password" required>
            </div>

            <button class="w-full px-10 py-2 bg-blue-600 text-white rounded-md
            hover:bg-blue-500 hover:drop-shadow-md duration-300 ease-in" type="submit" name="login-btn">
                LOGIN
            </button>

            <p class="text-right"><a class="text-blue-600 text-sm font-light hover:underline" href="cust_forgetpass.php">Forget Password?</a></p>
        </form>
    </div>

    <?php include 'footer.php' ?>
</body>

</html>

<?php include 'customer_login_process.php' ?>