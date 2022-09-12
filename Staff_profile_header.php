<?php
session_start();
if ($_SESSION['staff_login'] != true) {

    header('location:staff_login.php');
}

?>

<html>

<head>

    <!-- <link rel="stylesheet" type="text/css" href="css/staff_profile_header.css" /> -->

</head>

<body>


    <?php
    include 'db_connect.php';

    $staff_id = $_SESSION['staff_id'];
    $sql = "SELECT * FROM bank_staff WHERE Staff_id= '$staff_id' ";
    $result = $conn->query($sql);
    if ($result->num_rows > 0)
        $row = $result->fetch_assoc();

    ?>
    
    <div class="flex items-center justify-between bg-slate-100 py-3 px-10">
        <div class="flex items-center">
            <div class="rounded-3xl overflow-hidden border-[1px] border-slate-700 shadow-sm">
                <img src="" onerror="this.src='img/customers/No_image.jpg'" height="115px" width="105px" />
            </div>
            <div class="mx-4">
                <label class="text-xl mb-2 font-semibold">Welcome <?php echo $_SESSION['staff_name']; ?></label>
                <h6 class="font-medium font-mono">Last login : <?php echo $row['Last_login']; ?> </h6>
            </div>
        </div>
        <div>
            <a class="btn btn-primary" href="staff_profile.php"><input type="button" name="home" value="Home"></a>
            <a class="btn btn-danger" href="staff_logout.php"><input type="button" name="logout_btn" value="Logout"></a>
        </div>
    </div>


</body>

</html>