
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    
    <title>Admin Dashboard</title>

    <!-- Bootstrap core CSS -->
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">

    <script src="https://kit.fontawesome.com/6024fa2a98.js" crossorigin="anonymous"></script>
  </head>
  <body>
    <nav class="navbar navbar-expand-md navbar-light navbar-default">
      <!--<img src="Aurora.png" width="100">-->
      <div class="logo">
      
    <?php include('includes/top-header.php');?>
  </div>
</nav>
<!--end this nav-->

<header id="header">
  <div class="container">
    <div class="row">
      <div class="col-md-9">
        <h2><i class="fas fa-cogs"></i> DashBoard  <small>Manage your site</small></h2>
      </div>
      <div class="col-md-3">
          <div class="navbar-nav ml-auto navbar-expand-md">
                <ul class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell" style="color: #51073e;" ></i> <span class="badge badge-danger" id="count">1</span>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        </div>
                </ul>

                <ul class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-envelope" style="color: #51073e;"></i> <span class="badge badge-danger" id="count">1</span></a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown"></div>
                </ul>
          </div>
      </div>
    </div>
  </div>
</header>

<section id="breadcrumb">
  <div class="container">
    <ol class="breadcrumb">
      <li class="active">Dashboard</li>
    </ol>
  </div>
</section>

<section id="main">
  <div class="container">
    <div class="row">
      <div class="col-md-3">
        <div class="list-group">
           <a href="#" class="list-group-item list-group-item-action active main-color-bg"><i class="fas fa-cog"></i> DashBoard</a>
           <a href="#" class="list-group-item "><i class="fas fa-theater-masks"></i> Treatments</a>
           <a href="#" class="list-group-item "><i class="fas fa-gift"></i> Offer</a>
           <a href="#" class="list-group-item "><i class="fas fa-box-open"></i> Packeages</a>
           <a class="list-group-item" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-calendar-check"></i> Appoinment</a>
            <div class="dropdown-menu" aria-labelledby="dropdown01">
            <a class="list-group-item" href="#">Creation Appoinments</a>
            <a class="list-group-item" href="#">Appoinment History</a>
            <a class="list-group-item" href="#">Confirm Appoinments</a>
            <a class="list-group-item" href="#">Confirm Paid</a>
            </div>
           <a href="#" class="list-group-item "><i class="fas fa-calendar-alt"></i> Calender</a>
           <a href="#" class="list-group-item "><i class="fas fa-clipboard-list"></i> Report</a>
           <a href="#" class="list-group-item "><i class="fas fa-users"></i> User</a>

        </div>
      </div>
      <div class="col-md-9">
        <div class="panel panel-default">
          <div class="panel-heading  main-color-bg">
            <h4 class="panel-title" style="padding-bottom: 10px; padding-top: 10px; padding-left: 10px;">WebSite Over View</h4>
          </div>
          <div class="panel-body">
            <nav class="navbar navbar-expand-md">
            <div class="col-md-3">
              <div class="well dash-box">
                <h2><i class="fas fa-users"></i> 203</h2>
                <h4>User</h4>
              </div>
            </div>
            <div class="col-md-3">
              <div class="well dash-box">
                <h2><i class="fas fa-users"></i> 203</h2>
                <h4>User</h4>
              </div>
            </div>
            <div class="col-md-3">
              <div class="well dash-box">
                <h2><span><i class="fas fa-users"></i></span> 203</h2>
                <h4>User</h4>
              </div>
            </div>
            <div class="col-md-3">
              <div class="well dash-box">
                <h2><span><i class="fas fa-users"></i></span> 203</h2>
                <h4>User</h4>
              </div>
            </div>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>


    </body>
</html>
