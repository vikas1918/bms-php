<html>
</head>
<title>Delete Customer</title>
<!-- <link rel="stylesheet" type="text/css" href="css/delete_customer.css"> -->

</head>

<body>
    <?php include 'header.php';  ?>
    <?php include 'staff_profile_header.php' ?>


    <div class="container flex flex-col justify-center items-center py-10">
        <div class="mb-3 text-sky-900">
            <h4>Delete Customer</h4>
        </div>
        <form method="POST" class="bg-slate-200 flex flex-col w-80 p-5 rounded-md space-y-2">
            <input type="text" name="Cust_ac_no" placeholder="Customer Account No" class="form-control" required>
            <input type="text" name="Cust_ac_Id" placeholder="Customer ID" class="form-control" required>
            <input type="text" name="reason" placeholder="Reason" class="form-control" required><br>
            <input type="submit" name="delete" value="Delete" class="btn btn-primary">
        </form>
    </div>


    <?php include 'footer.php'; ?>
</body>

</html>


<?php

if (isset($_POST['delete'])) {
    $acc_no = $_POST['Cust_ac_no'];
    $cust_id = $_POST['Cust_ac_Id'];
    $reason = $_POST['reason'];

    include 'db_connect.php';

    $sql = "SELECT Account_no, Customer_ID FROM bank_Customers WHERE Account_no='$acc_no'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {


        $row = $result->fetch_assoc();

        if ($row['Account_no'] != $acc_no && $row['Customer_ID'] != $cust_id) {

            echo '<script>alert("Incorrect Details")</script>';
        } elseif ($row['Customer_ID'] != $cust_id) {

            echo '<script>alert("Incorrect Customer ID")</script>';
        } else {

            echo $row['Customer_ID'] . "<br>" . $row['Account_no'] . "<br>" . $reason;

            $conn->autocommit(FALSE);

            $sql1 = "DROP TABLE passbook_$cust_id, beneficiary_$cust_id";
            $sql2 = "DELETE FROM bank_customers WHERE  Account_no='$acc_no'";

            if (($conn->query($sql1)  && $conn->query($sql2)) == TRUE) {

                $conn->commit();
                echo '<script>alert("Customer Deleted Successfully")
			location="delete_customer.php"</script>';
            } else {

                $conn->rollback();
                echo '<script>alert("Customer not deleted")
        location="delete_customer.php"</script>';
            }
        }
    } else {

        echo '<script>alert("Incorrect Account Number")</script>';
    }
}

?>