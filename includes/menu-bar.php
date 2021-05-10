<div class="header-nav animate-dropdown">
    <div class="container">
        <div class="yamm navbar navbar-default" role="navigation">
            <div class="navbar-header">
                <button data-target="#mc-horizontal-menu-collapse" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="nav-bg-class">
                <div class="navbar-collapse collapse" id="mc-horizontal-menu-collapse">
	<div class="nav-outer">
		<ul class="nav navbar-nav">
			<li class="active dropdown yamm-fw">
				<a href="index.php" data-hover="dropdown" class="dropdown-toggle">Home</a>
				
			</li>
            <li><font color="#FFFF00" align="center">C</font><font color="#FF7F50 ">O</font><font color="#DA70D6">L</font><font color="#FF0000">O</font><font color="#0000FF">U</font><font color="#008080">R</font>  <font color="#7FFF00">W</font><font color="#87CEEB ">O</font><font color="#40E0D0 ">R</font><font color="#FFA500">L</font><font color="#98FB98">D</font></li>
              <?php $sql=mysqli_query($con,"select id,categoryName  from category limit 6");
while($row=mysqli_fetch_array($sql))
{
    ?>

			<li class="dropdown yamm">
				<a href="category.php?cid=<?php echo $row['id'];?>"> <?php echo $row['categoryName'];?></a>
			
			</li>
			<?php } ?>

			
		</ul>
		<div class="clearfix"></div>				
	</div>
</div>


            </div>
        </div>
    </div>
</div>