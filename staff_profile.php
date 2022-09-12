<?php ob_start(); ?>

<html>

<head>
	<title>Staff Home</title>
	<!-- <link rel="stylesheet" type="text/css" href="css/staff_profile.css" /> -->
</head>

<body>
	<?php
	include 'header.php';
	include 'staff_profile_header.php'; ?>
	<form method="post" class="py-16">
		<div class="h-96 grid grid-cols-2 grid-rows-3 container bg-sky-900 gap-4 p-5 rounded-lg">
			<input class="bg-sky-500 font-bold p-2 text-white rounded-md hover:bg-sky-600 hover:-translate-y-1 transition ease-in-out delay-100" type="submit" name="viewdet" value="View Active Customer" />
			<input class="bg-sky-500 font-bold p-2 text-white rounded-md hover:bg-sky-600 hover:-translate-y-1 transition ease-in-out delay-100" type="submit" name="view_cust_by_ac" value="View Customer by A/c No" />
			<input class="bg-sky-500 font-bold p-2 text-white rounded-md hover:bg-sky-600 hover:-translate-y-1 transition ease-in-out delay-100" type="submit" name="apprvac" value="Approve Pending Account" />
			<input class="bg-sky-500 font-bold p-2 text-white rounded-md hover:bg-sky-600 hover:-translate-y-1 transition ease-in-out delay-100" type="submit" name="del_cust" value="Delete Customer A/c" />
			<input class="bg-sky-500 font-bold p-2 text-white rounded-md hover:bg-sky-600 hover:-translate-y-1 transition ease-in-out delay-100" type="submit" name="credit_cust_ac" value="Credit Customer" />
		</div>
	</form>


	<?php include 'footer.php'; ?>
</body>

</html>


<?php

if (isset($_POST['viewdet'])) {


	header('location:active_customers.php');
}

if (isset($_POST['view_cust_by_ac'])) {

	header('location:view_customer_by_acc_no.php');
}
if (isset($_POST['apprvac'])) {

	header('location:pending_customers.php');
}
if (isset($_POST['view_trans'])) {

	echo '<script>alert("View Transaction")</script>';
}
if (isset($_POST['del_cust'])) {


	header('location:delete_customer.php');
}
if (isset($_POST['credit_cust_ac'])) {


	header('location:credit_customer_ac.php');
}

?>