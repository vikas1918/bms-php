<?php
session_start();
if ($_SESSION['customer_login'] != true) {

    header('location:customer_login.php');
}

?>

<html>

<head>

    <!-- <link rel="stylesheet" type="text/css" href="css/customer_profile_header.css" /> -->
</head>

<body id="customer_profile">


    <?php
    include 'db_connect.php';

    $customer_id = $_SESSION['customer_Id'];
    $sql = "SELECT * FROM bank_customers WHERE Customer_ID='$customer_id'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0)
        $row = $result->fetch_assoc();

    ?>

    <div class="flex items-center justify-between bg-slate-100 py-3 px-10">
        <div class="flex items-center">
            <div class="rounded-lg overflow-hidden border-[1px] border-slate-700 shadow-sm">
                <a href="upload.php"> <?php echo '<img class="custmr_img" src="data:image/jpeg;base64,' . base64_encode($row['Customer_Photo']) . '"'; ?> onerror="this.src='img/customers/No_image.jpg'" height="115px" width="105px"/> </a>
            </div>
            <div class="mx-4">
                <label class="text-xl mb-2 font-semibold">Welcome <?php echo $_SESSION['Username']; ?></label>
                <h6 class="font-medium font-mono">Last login : <?php echo $row['Last_Login'] ?> </h6>
            </div>
        </div>
        <div>
            <a class="btn btn-primary" href="customer_profile.php"><input type="button" name="home" value="Home" id="home"></a>
            <a class="btn btn-danger" href="customer_logout.php"><input type="button" name="logout_btn" value="Logout" id="logout"></a>
        </div>

    </div>
    <div class="flex justify-start">
        <ul class="nav space-x-4 ml-8">
            <a class="nav-item no-underline hover:bg-slate-100 hover:scale-y-110" href="customer_profile_myacc.php"> 
                <li class="nav-link">My Account</li>
            </a>
            <a class="nav-item no-underline hover:bg-slate-100 hover:scale-y-110" href="customer_profile_myprofile.php">
                <li class="nav-link">My Profile</li>
            </a>
            <a class="nav-item no-underline hover:bg-slate-100 hover:scale-y-110" href="customer_pass_change.php">
                <li class="nav-link">Change Password</li>
            </a>
            <a class="nav-item no-underline hover:bg-slate-100 hover:scale-y-110" href="fund_transfer.php">
                <li class="nav-link">Fund Transfer</li>
            </a>
            <a class="nav-item no-underline hover:bg-slate-100 hover:scale-y-110" href="cust_statement.php">
                <li class="nav-link">Statement</li>
            </a>
        </ul>
    </div>

</body>

</html>