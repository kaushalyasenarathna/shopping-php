 <style type="text/css">
 	

 	 
ul {
  list-style: none;
}
a {
  -webkit-transition: all 0.2s linear 0s;
  -moz-transition: all 0.2s linear 0s;
  -o-transition: all 0.2s linear 0s;
  transition: all 0.2s linear 0s;
}
body {
  font-size: 13px;
  color:   ;
 background-image: url(assets/images/sliders/8.jpg);
  overflow-x: hidden;
  margin: 0;
  padding: 0;
  font-family: 'Roboto', sans-serif;
}
 
 
.shopping-cart .estimate-ship-tax table tbody .unicase-form-control .dropdown-menu.open ul li a:hover,
 
 
.top-bar {
  background:#000000 ;
  padding: 10px 0 9px;
  font-size: 20px;
}
.top-bar .cnt-account {
  float: left;
  padding: 6px 0px;
}
.top-bar .cnt-account ul {
  margin: 0px;
}
.top-bar .cnt-account ul > li {
  display: inline-block;
  line-height: 12px;
  padding: 3px 12px;
  border-left: 1px solid #e2e2e2;
}
.top-bar .cnt-account ul > li:last-child {
  border-right: 1px solid #e2e2e2;
}
.top-bar .cnt-account ul > li a {
  color: #FF1493 ;
  padding: 0px;
  font-weight: 400;
  -webkit-transition: all 0.2s linear 0s;
  -moz-transition: all 0.2s linear 0s;
  -o-transition: all 0.2s linear 0s;
  transition: all 0.2s linear 0s;
}
.top-bar .cnt-account ul > li a .icon {
  display: block;
  float: left;
  padding-right: 6px;
  font-size: 11px;
}
.top-bar .cnt-account ul > li a:hover,
.top-bar .cnt-account ul > li a:focus {
  text-decoration: none;
}
.top-bar .cnt-block {
  float: right;
}
.top-bar .cnt-block .list-inline {
  margin: 0px;
}
.top-bar .cnt-block .list-inline > li {
  display: inline-block;
}
.top-bar .cnt-block .list-inline > li > a {
  padding: 6px 15px;
  border: 1px solid #FF1493 ;
  -webkit-transition: all 0.2s linear 0s;
  -moz-transition: all 0.2s linear 0s;
  -o-transition: all 0.2s linear 0s;
  transition: all 0.2s linear 0s;
  color: #FF1493 ;

  display: inline-block;
}
 
 
  </style>
<?php 
 

?>

<div class="top-bar animate-dropdown">
	<div class="container">
		<div class="header-top-inner">
			<div class="cnt-account">
				<ul class="list-unstyled">

<?php if(strlen($_SESSION['login']))
    {   ?>
				<li><a href="#"><img src="acc.png"  width="30px" height="25px">Welcome -<?php echo htmlentities($_SESSION['username']);?></a></li>
				<?php } ?>

					<li><a href="my-account.php">   <img src="ac.png"  width="30px" height="25px"> My Account</a></li>
					 
					<li><a href="my-cart.php"> <img src="cart2.png"  width="30px" height="25px">My Cart</a></li>
					
					<li class="dropdown dropdown-small">
						<a href="track-orders.php" class="dropdown-toggle" ><span class="key"><img src="track.png"  width="30px" height="25px">Track Order</b></a>
						
					</li>
	
				</ul>
			</div>

<div class="cnt-block">
				<ul class="list-unstyled list-inline">
					<li class="dropdown dropdown-small">
						
						<?php if(strlen($_SESSION['login'])==0)
    {   ?>
<li><a href="login.php"><img src="log.jpg"  width="30px" height="25px">   Login</a></li>
<?php }
else{ ?>
	
				<li><a href="logout.php">   <img src="logout.jpg"  width="30px" height="25px">Logout</a></li>
				<?php } ?>
					</li>

				
				</ul>
			</div>
			
			<div class="clearfix"></div>
		</div>
	</div>
</div>