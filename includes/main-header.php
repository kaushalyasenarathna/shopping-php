<?php 

 if(isset($_Get['action'])){
    if(!empty($_SESSION['cart'])){
    foreach($_POST['quantity'] as $key => $val){
      if($val==0){
        unset($_SESSION['cart'][$key]);
      }else{
        $_SESSION['cart'][$key]['quantity']=$val;
      }
    }
    }
  }
?>
  <div class="main-header">
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-3 logo-holder">
        
<div class="logo">
  <a href="index.php">
    
    <h2><font color="#FFFF00"> <img src="service.png"  width="30px" height="25px">SERVICES</font></h2>

  </a>
</div>    
</div>
<div class="col-xs-12 col-sm-12 col-md-6 top-search-holder">
<div class="search-area">
    <form name=" " >
   
 
  </head>
  <body>
    <p> <h1><font color="#FFFF00" align="center">C</font><font color="#FF7F50 ">O</font><font color="#DA70D6">L</font><font color="#FF0000">O</font><font color="#0000FF">U</font><font color="#008080">R</font>  <font color="#7FFF00">W</font><font color="#87CEEB ">O</font><font color="#40E0D0 ">R</font><font color="#FFA500">L</font><font color="#98FB98">D</font></h1></p>
  </body>
      
    </form>
</div> 
    </div> 

        <div class="col-xs-12 col-sm-12 col-md-3 animate-dropdown top-cart-row">
          
          <meta name='viewport' content='width=device-width, initial-scale=1'>
<script src='https://kit.fontawesome.com/a076d05399.js'></script>
<?php
if(!empty($_SESSION['cart'])){
  ?>
  <div class="dropdown dropdown-cart">
    <a href="#" class="dropdown-toggle lnk-cart" data-toggle="dropdown">
      <div class="items-cart-inner">
         
        <div class="basket">
<img src="cart.png"  width="30px" height="25px">
        </div>
        <div class="basket-item-count"><span class="count"><?php echo $_SESSION['qnty'];?></span></div>
      
        </div>
    </a>
    <ul class="dropdown-menu">
    
     <?php
    $sql = "SELECT * FROM products WHERE id IN(";
      foreach($_SESSION['cart'] as $id => $value){
      $sql .=$id. ",";
      }
      $sql=substr($sql,0,-1) . ") ORDER BY id ASC";
      $query = mysqli_query($con,$sql);
      $totalprice=0;
      $totalqunty=0;
      if(!empty($query)){
      while($row = mysqli_fetch_array($query)){
        $quantity=$_SESSION['cart'][$row['id']]['quantity'];
        $subtotal= $_SESSION['cart'][$row['id']]['quantity']*$row['productPrice'] ;
        $totalprice += $subtotal;
        $_SESSION['qnty']=$totalqunty+=$quantity;

  ?>
    
    
      <li>
        <div class="cart-item product-summary">
          <div class="row">
            <div class="col-xs-4">
              <div class="image">
                <a href="product-details.php?pid=<?php echo $row['id'];?>"><img  src="admin/productimages/<?php echo $row['id'];?>/<?php echo $row['productImage1'];?>" width="35" height="50" alt=""></a>
              </div>
            </div>
            <div class="col-xs-7">
              
              <h3 class="name"><a href="product-details.php?pid=<?php echo $row['id'];?>"><?php echo $row['productName']; ?></a></h3>
              <div class="price">Rs.<?php echo ($row['productPrice']+$row['shippingCharge']); ?>*<?php echo $_SESSION['cart'][$row['id']]['quantity']; ?></div>
            </div>
            
          </div>
        </div>
      
        <?php } }?>
        <div class="clearfix"></div>
      <hr>
    
      <div class="clearfix cart-total">
        <div class="pull-right">
          
            <span class="text">Total :</span><span class='price'>Rs.<?php echo $_SESSION['tp']="$totalprice". ".00"; ?></span>
            
        </div>
      
        <div class="clearfix"></div>
          
        <a href="my-cart.php" class="btn btn-upper btn-primary btn-block m-t-20">My Cart</a>  
      </div> 
          
        
    </li>
    </ul> 
  </div> 
<?php } else { ?>
<div class="dropdown dropdown-cart">
    <a href="#" class="dropdown-toggle lnk-cart" data-toggle="dropdown">
      <div class="items-cart-inner">
        <div class="total-price-basket">
          <span class="lbl">cart -</span>
          <span class="total-price">
            <span class="sign">Rs.</span>
            <span class="value">00.00</span>
          </span>
        </div>
        <div class="basket">
           <img src="cart.png"  width="30px" height="25px">
        </div>
        <div class="basket-item-count"><span class="count">0</span></div>
      
        </div>
    </a>
    <ul class="dropdown-menu">
    
  
    
    
      <li>
        <div class="cart-item product-summary">
          <div class="row">
            <div class="col-xs-12">
              Your Shopping Cart is Empty.
            </div>
            
            
          </div>
        </div> 
        
      <hr>
    
      <div class="clearfix cart-total">
        
        <div class="clearfix"></div>
          
        <a href="index.php" class="btn btn-upper btn-primary btn-block m-t-20">Continue Shooping</a>  
      </div> 
          
        
    </li>
    </ul> 
  </div>
  <?php }?>



      </div>
      </div>

    </div>

  </div>