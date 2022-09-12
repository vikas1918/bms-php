<?php
include 'header.php';
include 'customer_profile_header.php';
if ($_SESSION['customer_login'] == FALSE) {
    header('location:customer_login.php');
}


?>
<html>

<head>
    <title>My Profile</title>
    <link rel="stylesheet" type="text/css" href="css/customer_profile.css" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


    <!-- TAILWIND CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>


    <?php
    $cust_id = $_SESSION['customer_Id'];
    include 'db_connect.php';
    $sql = "SELECT * FROM bank_customers where Customer_ID= '$cust_id' ";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $current_bal = $row['Current_Balance'];
    ?>

    <div class="h-screen flex items-center justify-center space-x-14">
        <div class="flex flex-col bg-gray-100 rounded p-5 shadow-xl">
            <span class="text-center font-bold">Account Details</span><br>
            <label class="my-2 px-3 py-1 rounded-sm bg-white shadow-md">Customer Id : <?php echo $_SESSION['customer_Id']; ?></label>
            <label class="my-2 px-3 py-1 rounded-sm bg-white shadow-md">Account Number : <?php echo $_SESSION['Account_No']; ?></label>
            <label class="my-2 px-3 py-1 rounded-sm bg-white shadow-md">Account Name : <?php echo $_SESSION['Username']; ?></label>
            <label class="my-2 px-3 py-1 rounded-sm bg-white shadow-md">Account Type : <?php echo $_SESSION['Account_type']; ?></label>
            <label class="my-2 px-3 py-1 rounded-sm bg-white shadow-md">Available Balance : $<?php echo $current_bal; ?></label>
        </div>
        <div class="bg-gray-100 flex items-center justify-center flex-col rounded p-5 shadow-xl border-blue-800 border-[1px]">
            <span class="text-center font-bold mb-4">Bank Statement</span>
            <table class="table table-striped">
                <th width="5%">#</th>
                <th width="15%">Date</th>
                <th width="15%">Trans. Id</th>
                <th width="31%">Description</th>
                <th width="10%">Cr.</th>
                <th width="10%">Dr.</th>
                <th width="20%">Total</th>
                <?php

                $cust_id = $_SESSION['customer_Id'];

                $sql = "SELECT * from passbook_$cust_id ORDER By Id DESC LIMIT 10";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    $Sl_no = 1;

                    while ($row = $result->fetch_assoc()) {

                        echo '
                        <tr>
                        <td>' . $Sl_no++ . '</td>
                        <td>' . $row['Transaction_date'] . '</td>
                        <td>' . $row['Transaction_id'] . '</td>
                        <td>' . $row['Description'] . '</td>
                        <td>' . $row['Cr_amount'] . '</td>
                        <td>' . $row['Dr_amount'] . '</td>
                        <td>$' . $row['Net_Balance'] . '</td>
                        </tr>';
                    }
                }

                ?>
            </table>
        </div>
    </div>

    <?php include 'footer.php'; ?>
</body>

</html>