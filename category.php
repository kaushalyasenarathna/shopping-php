<?php
session_start();
error_reporting(0);
include('includes/config.php');
$cid=intval($_GET['cid']);
if(isset($_GET['action']) && $_GET['action']=="add"){
	$id=intval($_GET['id']);
	if(isset($_SESSION['cart'][$id])){
		$_SESSION['cart'][$id]['quantity']++;
	}else{
		$sql_p="SELECT * FROM products WHERE id={$id}";
		$query_p=mysqli_query($con,$sql_p);
		if(mysqli_num_rows($query_p)!=0){
			$row_p=mysqli_fetch_array($query_p);
			$_SESSION['cart'][$row_p['id']]=array("quantity" => 1, "price" => $row_p['productPrice']);
				echo "<script>alert('Product has been added to the cart')</script>";
		echo "<script type='text/javascript'> document.location ='my-cart.php'; </script>";
		}else{
			$message="Product ID is invalid";
		}
	}
	
}

if(isset($_GET['pid']) && $_GET['action']=="wishlist" ){
	if(strlen($_SESSION['login'])==0)
    {   
header('location:login.php');
}
else
{
mysqli_query($con,"insert into wishlist(userId,productId) values('".$_SESSION['id']."','".$_GET['pid']."')");
echo "<script>alert('Product aaded in wishlist');</script>";
header('location:my-wishlist.php');

}
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		 
		<meta charset="utf-8">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
	 
 
	    
	     

	    <title>Product Category</title>

 
	    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
	  
	    <link rel="stylesheet" href="assets/css/main.css">
	    <link rel="stylesheet" href="assets/css/green.css">
	    <link rel="stylesheet" href="assets/css/owl.carousel.css">
		<link rel="stylesheet" href="assets/css/owl.transitions.css">
		<link href="assets/css/lightbox.css" rel="stylesheet">
		<link rel="stylesheet" href="assets/css/animate.min.css">
		<link rel="stylesheet" href="assets/css/rateit.css">
		<link rel="stylesheet" href="assets/css/bootstrap-select.min.css">
		<link rel="stylesheet" href="assets/css/config.css">
		<link href="assets/css/green.css" rel="alternate stylesheet" title="Green color">
		<link href="assets/css/blue.css" rel="alternate stylesheet" title="Blue color">
		<link href="assets/css/red.css" rel="alternate stylesheet" title="Red color">
		<link href="assets/css/orange.css" rel="alternate stylesheet" title="Orange color">
		<link href="assets/css/dark-green.css" rel="alternate stylesheet" title="Darkgreen color">
 

		
 
		<link rel="stylesheet" href="assets/css/font-awesome.min.css">

    
		
	 
<style type="text/css">
 
 
.sidebar .side-menu .head {
  -webkit-border-radius: 0px;
  -moz-border-radius: 0px;
  border-radius: 0px;
  color:#F0FFF0 ;
  font-size: 19px;
  font-family: '';
  padding: 15px 17px;
  text-transform: uppercase;
  background: #2F4F4F;
}
.sidebar .side-menu .head .icon {
  margin-right: 20px;
}
.sidebar .side-menu nav .nav > li {
  -moz-border-bottom-colors: none;
  -moz-border-left-colors: none;
  -moz-border-right-colors: none;
  -moz-border-top-colors: none;
  border-color: -moz-use-text-color #ebebeb;
  border-image: none;
  border-left: 1px solid #ebebeb;
  border-right: 1px solid #ebebeb;
  border-style: none solid;
  border-width: 0 1px;
  -webkit-transition: all 0.3s ease 0s;
  -moz-transition: all 0.3s ease 0s;
  -o-transition: all 0.3s ease 0s;
  transition: all 0.3s ease 0s;
  position: relative;
  width: 100%;
  border-bottom: 1px solid #e8e8e8;
  background: #f7f7f7;
}
.sidebar .side-menu nav .nav > li > a {
  padding: 13px 15px;
  color: #C71585;
  text-transform: uppercase;
}
.sidebar .side-menu nav .nav > li > a:after {
  color: #bababa;
   
  float: right;
  font-size: 12px;
  height: 20px;
  line-height: 18px;
  -webkit-transition: all 0.3s ease 0s;
  -moz-transition: all 0.3s ease 0s;
  -o-transition: all 0.3s ease 0s;
  transition: all 0.3s ease 0s;
  width: 20px;
  font-family: FontAwesome;
}
.sidebar .side-menu nav .nav > li > a .icon {
  font-size: 20px;
  margin-right: 25px;
}
.sidebar .side-menu nav .nav > li > a:hover,
.sidebar .side-menu nav .nav > li > a:focus {
  background: #fff;
  border-left: 5px solid #abd07e;
}
.sidebar .side-menu nav .nav > li > a:hover .icon,
.sidebar .side-menu nav .nav > li > a:focus .icon {
  color: #666666;
}
.sidebar .side-menu nav .nav > li > .mega-menu {
  padding: 3px 0;
  top: 0 !important;
  left: 100%;
  margin: 0;
  min-width: 330%;
    
  position: absolute;
  top: 0px;
  -webkit-border-radius: 0px;
  -moz-border-radius: 0px;
  border-radius: 0px;
}
.sidebar .side-menu nav .nav > li > .mega-menu .yamm-content {
  padding: 10px 20px;
}
.sidebar .side-menu nav .nav > li > .mega-menu .yamm-content ul > li {
  border-bottom: 1px solid #E0E0E0;
  padding: 5px 0;
  -webkit-transition: all 0.3s ease 0s;
  -moz-transition: all 0.3s ease 0s;
  -o-transition: all 0.3s ease 0s;
  transition: all 0.3s ease 0s;
}
.sidebar .side-menu nav .nav > li > .mega-menu .yamm-content ul > li:last-child {
  border-bottom: none;
}
.sidebar .side-menu nav .nav > li > .mega-menu .yamm-content ul > li > a {
  line-height: 26px;
  padding: 0px;
}
.sidebar .side-menu nav .nav > li > .mega-menu .yamm-content .dropdown-banner-holder {
  position: absolute;
  right: -36px;
  top: -8px;
}
.sidebar .side-menu2 nav .nav li a {
  padding: 14.3px 15px;
}
.sidebar .sidebar-module-container .sidebar-widget .widget-header {
  background:;
  padding: 10px 15px;
    background-color: #E45E9D;
    color: #7D2252;
}
.sidebar .sidebar-module-container .sidebar-widget .widget-header .widget-title {
  font-size: 24px;
  font-family: 'FjallaOneRegular';
  margin: 0px;


}
.sidebar .sidebar-module-container .sidebar-widget .sidebar-widget-body .accordion .accordion-group .accordion-heading .accordion-toggle {
  clear: both;
  display: block;
  font-family: 'Roboto', sans-serif;
  font-size: 18px;
  font-weight: 300;
  line-height: 36px;
  background-color: #25383C;
}
.sidebar .sidebar-module-container .sidebar-widget .sidebar-widget-body .accordion .accordion-group .accordion-heading .accordion-toggle:after {
  
  float: right;
  font-family: fontawesome;
}
.sidebar .sidebar-module-container .sidebar-widget .sidebar-widget-body .accordion .accordion-group .accordion-heading .accordion-toggle.collapsed {
  color:#C71585;
}
.sidebar .sidebar-module-container .sidebar-widget .sidebar-widget-body .accordion .accordion-group .accordion-heading .accordion-toggle.collapsed:after {
  color: #636363;

  font-family: fontawesome;
}
.sidebar .sidebar-module-container .sidebar-widget .sidebar-widget-body .accordion .accordion-group .accordion-body .accordion-inner {
  margin: 14px 0 20px;
}
.sidebar .sidebar-module-container .sidebar-widget .sidebar-widget-body .accordion .accordion-group .accordion-body .accordion-inner ul {
  padding-left: 15px;
}
.sidebar .sidebar-module-container .sidebar-widget .sidebar-widget-body .accordion .accordion-group .accordion-body .accordion-inner ul li {
  line-height: 27px;
}
.sidebar .sidebar-module-container .sidebar-widget .sidebar-widget-body .accordion .accordion-group .accordion-body .accordion-inner ul li a {
  color: #666666;
}
.sidebar .sidebar-module-container .sidebar-widget .sidebar-widget-body .accordion .accordion-group .accordion-body .accordion-inner ul li a:before {
  
  font-family: ;
  font-size: 14px;
  line-height: 15px;
  margin: 0 5px 0 0;
  -webkit-transition: all 0.3s ease 0s;
  -moz-transition: all 0.3s ease 0s;
  -o-transition: all 0.3s ease 0s;
  transition: all 0.3s ease 0s;
}
.sidebar .sidebar-module-container .sidebar-widget .sidebar-widget-body .accordion .accordion-group .accordion-body .accordion-inner ul li a:hover:before {
  margin: 0 8px 0 0;
}
.sidebar .sidebar-module-container .sidebar-widget .sidebar-widget-body .price-range-holder {
  padding: 0 0 20px;
  position: relative;
}
.sidebar .sidebar-module-container .sidebar-widget .sidebar-widget-body .price-range-holder .slider {
  display: inline-block;
  position: relative;
  vertical-align: middle;
  margin-top: 15px;
}
.sidebar .sidebar-module-container .sidebar-widget .sidebar-widget-body .price-range-holder .slider.slider-horizontal {
  height: 20px;
  width: 100% !important;
}
.sidebar .sidebar-module-container .sidebar-widget .sidebar-widget-body .price-range-holder .slider .slider-track {
  background-color: #f1f1f1;
  background-repeat: repeat-x;
  cursor: pointer;
  position: absolute;
  width: 94% !important;
  height: 6px;
  left: 0;
  margin-top: -5px;
  top: 50%;
  width: 100%;
}
.sidebar .sidebar-module-container .sidebar-widget .sidebar-widget-body .price-range-holder .slider .slider-track .slider-selection {
  bottom: 0;
  height: 100%;
  top: 0;
  background-repeat: repeat-x;
  box-sizing: border-box;
  position: absolute;
  background: #c3c3c3;
}
.sidebar .sidebar-module-container .sidebar-widget .sidebar-widget-body .price-range-holder .slider .slider-track .slider-handle {
  background-color: #FFFFFF;
  background-repeat: repeat-x;
  -webkit-border-radius: 400px;
  -moz-border-radius: 400px;
  border-radius: 400px;
  height: 20px;
  margin-left: -3px !important;
  opacity: 1;
  position: absolute;
  top: -3px;
  width: 20px;
  margin-top: -5px;
}
.sidebar .sidebar-module-container .sidebar-widget .sidebar-widget-body .price-range-holder .slider .tooltip {
  margin-top: -36px;
}
.sidebar .sidebar-module-container .sidebar-widget .sidebar-widget-body .price-range-holder .min-max {
  font-size: 15px;
  font-weight: 700;
  color: #fe5252;
  margin-top: 15px;
}
.sidebar .sidebar-module-container .sidebar-widget .sidebar-widget-body .list li {
  clear: both;
  display: block;
  font-family: 'Roboto', sans-serif;
  font-size: 13px;
  font-weight: 300;
  line-height: 36px;
}
.sidebar .sidebar-module-container .sidebar-widget .sidebar-widget-body .list li a {
  color: #666666;
  display: block;
}
.sidebar .sidebar-module-container .sidebar-widget .sidebar-widget-body .compare-report {
  margin-top: 20px;
  margin-bottom: 30px;
}
.sidebar .sidebar-widget .advertisement .item {
  background-color: #e7e7e7;
  background-position: center 55%;
  background-size: cover;
  height: 430px;
}
.sidebar .sidebar-widget .advertisement .item .caption {
  color: #636363;
  left: 12%;
  letter-spacing: -3px;
  position: absolute;
  top: 11%;
  z-index: 100;
  display: table-cell;
}
.sidebar .sidebar-widget .advertisement .item .caption .big-text {
  font-size: 60px;
  line-height: 125px;
  text-transform: uppercase;
  font-family: 'FjallaOneRegular';
  color: #fff;
  text-shadow: 1px 1px 3px #cfcfcf;
}
.sidebar .sidebar-widget .advertisement .item .caption .big-text .big {
  font-size: 120px;
  color: #ff7878;
  display: block;
  text-shadow: 1px 1px 3px #cfcfcf;
}
.sidebar .sidebar-widget .advertisement .item .caption .excerpt {
  font-size: 24px;
  letter-spacing: -1px;
  text-transform: uppercase;
  color: #e6e6e6;
  text-shadow: 1px 1px 3px #cfcfcf;
}
.sidebar .sidebar-widget .advertisement .owl-controls {
  bottom: 20px;
  position: absolute;
  text-align: center;
  top: auto;
  width: 100%;

}
.product .product-info .product-price .price-before-discount {
  text-decoration: line-through;
  color: #d3d3d3;
  font-weight: 400;
  line-height: 30px;
  font-size: 14px;
}
.sidebar .sidebar-widget .advertisement .owl-controls .owl-pagination {
  display: inline-block;
}
.sidebar .sidebar-widget .advertisement .owl-controls .owl-pagination .owl-page {
  display: inline-block;
}
.sidebar .sidebar-widget .advertisement .owl-controls .owl-pagination .owl-page span {
  display: block;
  width: 15px;
  height: 15px;
  background: #fff;
  border: none;
  -webkit-border-radius: 50%;
  -moz-border-radius: 50%;
  border-radius: 50%;
  margin: 0 5px;
  -webkit-transition: all 200ms ease-out;
  -moz-transition: all 200ms ease-out;
  -o-transition: all 200ms ease-out;
  transition: all 200ms ease-out;
} 
 
  header{
 background-color:#CFECEC;
   background-size: cover;
  background-position: center;
  
}

</style>

	</head>
    <body class="cnt-home">
	
 
 
<?php include('includes/top-header.php');?>



<header>
 
<?php include('includes/main-header.php');?>
 
</div><!-- /.breadcrumb -->
<div class="body-content outer-top-xs">
	<div class='container'>
		<div class='row outer-bottom-sm'>
			<div class='col-md-3 sidebar'>
	            <!-- ================================== TOP NAVIGATION ================================== -->
<div class="side-menu animate-dropdown outer-bottom-xs">       
<div class="side-menu animate-dropdown outer-bottom-xs">
    <div class="head"><i class="icon fa fa-align-justify fa-fw"></i>Sub Categories</div>        
    <nav class="yamm megamenu-horizontal" role="navigation">
  
        <ul class="nav">
            <li class="dropdown menu-item">
              <?php $sql=mysqli_query($con,"select id,subcategory  from subcategory where categoryid='$cid'");

while($row=mysqli_fetch_array($sql))
{
    ?>
                <a href="sub-category.php?scid=<?php echo $row['id'];?>" class="dropdown-toggle"><img src="p.jpg"  width="30px" height="25px">
                <?php echo $row['subcategory'];?></a>
                <?php }?>
                        
</li>
</ul>
    </nav>
</div>
</div><!-- /.side-menu -->
<!-- ================================== TOP NAVIGATION : END ================================== -->	            <div class="sidebar-module-container">
	            	<h3 class="section-title">shop by</h3>
	            	<div class="sidebar-filter">
		            	<!-- ============================================== SIDEBAR CATEGORY ============================================== -->
<div class="sidebar-widget wow fadeInUp outer-bottom-xs ">
	<div class="widget-header m-t-20">
		<h4 class="widget-title">Category</h4>
	</div>
	<div class="sidebar-widget-body m-t-11">
	         <?php $sql=mysqli_query($con,"select id,categoryName  from category");
while($row=mysqli_fetch_array($sql))
{
    ?>
		<div class="accordion">
	    	<div class="accordion-group">
	            <div class="accordion-heading">
	                <a href="category.php?cid=<?php echo $row['id'];?>"  class="accordion-toggle collapsed">
	                  <font color="yellow"> <?php echo $row['categoryName'];?></font>
	                </a>
	            </div>  
	        </div>
	    </div>
	    <?php } ?>
	</div><!-- /.sidebar-widget-body -->
</div><!-- /.sidebar-widget -->



    
<!-- ============================================== COLOR: END ============================================== -->

	            	</div><!-- /.sidebar-filter -->
	            </div><!-- /.sidebar-module-container -->
            </div><!-- /.sidebar -->
			<div class='col-md-9'>
					<!-- ========================================== SECTION – HERO ========================================= -->
          <header>


		<div class="item">	
			<div class="image">
				<img src="f.jpg" alt="" class="img-responsive">
			</div>
			<div class="container-fluid">
				<div class="caption vertical-top text-left">
					<div class="big-text">
						<br />
					</div>
  <div id="category" class="category-carousel hidden-xs">
					       <?php $sql=mysqli_query($con,"select categoryName  from category where id='$cid'");
while($row=mysqli_fetch_array($sql))
{
    ?>

					<div class="excerpt hidden-sm hidden-md">
						<?php echo htmlentities($row['categoryName']);?>
					</div>
			<?php } ?>
			
				</div><!-- /.caption -->
			</div><!-- /.container-fluid -->
		</div>
</div>

				<div class="search-result-container">
					<div id="myTabContent" class="tab-content">
						<div class="tab-pane active " id="grid-container">
							<div class="category-product  inner-top-vs">
								<div class="row">									
			<?php
$ret=mysqli_query($con,"select * from products where category='$cid'");
$num=mysqli_num_rows($ret);
if($num>0)
{
while ($row=mysqli_fetch_array($ret)) 
{?>							
		<div class="col-sm-6 col-md-4 wow fadeInUp">
			<div class="products">				
	<div class="product">		
		<div class="product-image">
			<div class="image">
				<a href="product-details.php?pid=<?php echo htmlentities($row['id']);?>"><img  src="assets/images/blank.gif" data-echo="admin/productimages/<?php echo htmlentities($row['id']);?>/<?php echo htmlentities($row['productImage1']);?>" alt="" width="200" height="300"></a>
			</div><!-- /.image -->			                      		   
		</div><!-- /.product-image -->
			
		
		<div class="product-info text-left">
			<h3 class="name"><a href="product-details.php?pid=<?php echo htmlentities($row['id']);?>"><font color="red"><?php echo htmlentities($row['productName']);?></font></a></h3>
	 
			<div class="description"></div>

			<div class="product-price">	
				<span class="price">
					Rs. <?php echo htmlentities($row['productPrice']);?>			</span>
										     <span class="price-before-discount">Rs. <?php echo htmlentities($row['productPriceBeforeDiscount']);?></span>
									
			</div><!-- /.product-price -->
			
		</div><!-- /.product-info -->
					<div class="cart clearfix animate-effect">
				<div class="action">
					<ul class="list-unstyled">

						<li class="add-cart-button btn-group">
						
								<?php if($row['productAvailability']=='In Stock'){?>
										<button class="btn btn-primary icon" data-toggle="dropdown" type="button">
								<i class="fa fa-shopping-cart"></i>													
							</button>
							<a href="category.php?page=product&action=add&id=<?php echo $row['id']; ?>">
							<button class="btn btn-primary" type="button">Add to cart</button></a>
								<?php } else {?>
							<div class="action" style="color:red">Out of Stock</div>
					<?php } ?>
													
						</li>
	                   
		               

						
					</ul>
				</div><!-- /.action -->
			</div><!-- /.cart -->
			</div>
			</div>
		</div>
	  <?php } } else {?>
	
		<div class="col-sm-6 col-md-4 wow fadeInUp"> <h3>No Product Found</h3>
		</div>
		
<?php } ?>	
		
	
		
		
	
		
	
		
	
		
										</div>
							</div>
						
						</div>
						
				

				</div>

			</div>
		</div></div>
 
		
</div>
</div>
</header>
	<script src="assets/js/jquery-1.11.1.min.js"></script>
	
	<script src="assets/js/bootstrap.min.js"></script>
	
	<script src="assets/js/bootstrap-hover-dropdown.min.js"></script>
	<script src="assets/js/owl.carousel.min.js"></script>
	
	<script src="assets/js/echo.min.js"></script>
	<script src="assets/js/jquery.easing-1.3.min.js"></script>;
	<script src="assets/js/bootstrap-slider.min.js"></script>
    <script src="assets/js/jquery.rateit.min.js"></script>
    <script type="text/javascript" src="assets/js/lightbox.min.js"></script>
    <script src="assets/js/bootstrap-select.min.js"></script>
    <script src="assets/js/wow.min.js"></script>
	<script src="assets/js/scripts.js"></script>

	<!-- For demo purposes – can be removed on production -->
	
	<script src="switchstylesheet/switchstylesheet.js"></script>
	
	<script>
		$(document).ready(function(){ 
			$(".changecolor").switchstylesheet( { seperator:"color"} );
			$('.show-theme-options').click(function(){
				$(this).parent().toggleClass('open');
				return false;
			});
		});

		$(window).bind("load", function() {
		   $('.show-theme-options').delay(2000).trigger('click');
		});
	</script>
	<!-- For demo purposes – can be removed on production : End -->

	

</body>
</html>