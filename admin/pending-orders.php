
<?php
session_start();
include('include/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{

date_default_timezone_set('Asia/Kolkata');// change according timezone
$currentTime = date( 'd-m-Y h:i:s A', time () );


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin| Pending Orders</title>
	<link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link type="text/css" href="css/theme.css" rel="stylesheet">
	<link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
	<link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
	<script language="javascript" type="text/javascript">
var popUpWin=0;
function popUpWindow(URLStr, left, top, width, height)
{
 if(popUpWin)
{
if(!popUpWin.closed) popUpWin.close();
}
popUpWin = open(URLStr,'popUpWin', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=yes,width='+600+',height='+600+',left='+left+', top='+top+',screenX='+left+',screenY='+top+'');
}

</script>
</head>
<body>
<?php include('include/header.php');?>

	<div class="wrapper">
		<div class="container">
			<div class="row">
<?php include('include/sidebar.php');?>				
			<div class="span10">
					<div class="content">

	<div class="module">
							<div class="module-head">
								<h3>Pending Orders</h3>
							</div>
							<div class="modules-body table">
	<?php if(isset($_GET['del']))
{?>
									<div class="alert alert-error">
										<button type="button" class="close" data-dismiss="alert">×</button>
									<strong>Oh snap!</strong> 	<?php echo htmlentities($_SESSION['delmsg']);?><?php echo htmlentities($_SESSION['delmsg']="");?>
									</div>
<?php } ?>

									<br />

							
								<table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display table-responsive" >
									<thead>
										<tr>
											<th>#</th>
											 
											<th>Billing Address</th>
											<th>Product </th>
											<th>Qty </th>
											<th>Amount </th>
											<th>Order Date</th>
											<th>Action</th>
											
										
										</tr>
									</thead>
								
<tbody>
<?php 
$status='Delivered';
$query=mysqli_query($con,"select users.name as username,users.email as useremail,users.contactno as usercontact,users.billingAddress as billingaddress,users.billingCity as billingcity,users.billingState as billingstate,users.billingPincode as billingpincode,products.productName as productname,orders.quantity as quantity,orders.orderDate as orderdate,products.productPrice as productprice,orders.id as id  from orders join users on  orders.userId=users.id join products on products.id=orders.productId where orders.	orderStatus!='$status' or orders.orderStatus is null");
$cnt=1;
while($row=mysqli_fetch_array($query))
{
?>										
										<tr>
											<td><?php echo htmlentities($cnt);?></td>
											 
<td><?php echo htmlentities($row['billingaddress'].",".$row['billingcity'].",".$row['billingstate']."-".$row['billingpincode']);?></td>
											<td><?php echo htmlentities($row['productname']);?>
												<?php echo htmlentities($row['id']);?>
												
											</td>
											<td><?php echo htmlentities($row['quantity']);?></td>
											<td><?php echo htmlentities($row['quantity']*$row['productprice'] );?></td>
											<td><?php echo htmlentities($row['orderdate']);?></td>
											<td>   <a href="updateorder.php?oid=<?php echo htmlentities($row['id']);?>" title="Update order" target="_blank">  <img src="up.jpg"  width="30px" height="25px"></a>
											</td>
											</tr>

										<?php $cnt=$cnt+1; } ?>
										</tbody>
								</table>
							</div>
						</div>						

						
						
					</div><!--/.content-->
				</div><!--/.span9-->
			</div>
		</div><!--/.container-->
	</div><!--/.wrapper-->

<?php include('include/footer.php');?>

	<script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
	<script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
	<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
	<script src="scripts/datatables/jquery.dataTables.js"></script>
	<script>
		$(document).ready(function() {
			$('.datatable-1').dataTable();
			$('.dataTables_paginate').addClass("btn-group datatable-pagination");
			$('.dataTables_paginate > a').wrapInner('<span />');
			$('.dataTables_paginate > a:first-child').append('<img src="pre.png"  width="30px" height="25px">');
			$('.dataTables_paginate > a:last-child').append('<img src="next.png"  width="30px" height="25px">');
		} );
	</script>
</body>
<?php } ?>