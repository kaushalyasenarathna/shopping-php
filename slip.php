
 
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
  background-color:black;
}

* {
 
}

 
.container {
  padding: 12px;
  background-color: white;
}

 
input[type=text], input[type=password] {
  width: 15%;
  padding: 20px;
  margin: 0px 0 0px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

 hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 0px;
}


.but_upload{

background-color: red;


}


</style>
 






<?php

$db_host="localhost"; //localhost server 
$db_user="root";  //database username
$db_password="";  //database password   
$db_name="cw";  //database name

try
{
  $db=new PDO("mysql:host={$db_host};dbname={$db_name}",$db_user,$db_password);
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOEXCEPTION $e)
{
  $e->getMessage();
}

if(isset($_REQUEST['btn_insert']))
{
  try
  {
    $orderid  = $_REQUEST['orderid']; //textbox name "txt_name"
  
    $image_file = $_FILES["txt_file"]["name"];
    $size1=$_REQUEST['size']; 
    
    $type   = $_FILES["txt_file"]["type"];  //file name "txt_file"  
    $size   = $_FILES["txt_file"]["size"];
    $temp   = $_FILES["txt_file"]["tmp_name"]; 
    $description=$_REQUEST['description'];
    $path="up/".$image_file; //set upload folder path
    
    if(empty($orderid)){
      $errorMsg="Please Enter id";
    }
    else if(empty($image_file)){
      $errorMsg="Please Select Image";
    }
    elseif (empty($size1)) {
      $errorMsg="please enter price";
    }
    elseif (empty($description)) {
      $errorMsg="please enter description";
    }
    else if($type=="image/jpg" || $type=='image/jpeg' || $type=='image/png' || $type=='image/gif') //check file extension
    { 
      if(!file_exists($path)) //check file not exist in your upload folder path
      {
        if($size < 5000000) //check file size 5MB
        {
          move_uploaded_file($temp, "up/" .$image_file); //move upload file temperory directory to your upload folder
        }
        else
        {
          $errorMsg="Your File To large Please Upload 5MB Size"; //error message file size not large than 5MB
        }
      }
      else
      { 
        $errorMsg="File Already Exists...Check Upload Folder"; //error message file not exists your upload folder path
      }
    }
    else
    {
      $errorMsg="Upload JPG , JPEG , PNG & GIF File Formate.....CHECK FILE EXTENSION"; //error message file extension
    }
    
    if(!isset($errorMsg))
    {
      $insert_stmt=$db->prepare('INSERT INTO slip(orderid,image,size,description) VALUES(:orderid,:fimage,:size,:description)'); //sql insert query         
      $insert_stmt->bindParam(':orderid',$orderid);
    
      $insert_stmt->bindParam(':fimage',$image_file);   //bind all parameter 
      $insert_stmt->bindParam(':size',$size1);  
      $insert_stmt->bindParam(':description',$description); 
      if($insert_stmt->execute())
      {
        $insertMsg="File Upload Successfully........"; //execute query success message
        header("refresh:3;index.php"); //refresh 3 second and redirect to index.php page
      }
    }
  }
  catch(PDOException $e)
  {
    echo $e->getMessage();
  }
}

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="initial-scale=1.0, maximum-scale=2.0">
<title></title>
    
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<script src="js/jquery-1.12.4-jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
    
</head>

  <body>
  
    <p> <h1><font color="#FFFF00" align="center">C</font><font color="#FF7F50 ">O</font><font color="#DA70D6">L</font><font color="#FF0000">O</font><font color="#0000FF">U</font><font color="#008080">R</font>  <font color="#7FFF00">W</font><font color="#87CEEB ">O</font><font color="#40E0D0 ">R</font><font color="#FFA500">L</font><font color="#98FB98">D</font></h1></p>
 
  
  <div class="wrapper">
  
  <div class="container">
      
    <div class="col-lg-12">
    
    <?php
    if(isset($errorMsg))
    {
      ?>
            <div class="alert alert-danger">
              <strong>WRONG ! <?php echo $errorMsg; ?></strong>
            </div>
            <?php
    }
    if(isset($insertMsg)){
    ?>
      <div class="alert alert-success">
        <strong>SUCCESS ! <?php echo $insertMsg; ?></strong>
      </div>
        <?php
    }
    ?>   
    
      <form method="post" class="form-horizontal" enctype="multipart/form-data">
          
        <div class="form-group">
        <label class="col-sm-3 control-label"><h3>Name</h3></label>
        <div class="col-sm-6">
        <input type="text" name="orderid" class="form-control" placeholder="enter id" />
  </div>
        </div>
          
          
        <div class="form-group">
        <label class="col-sm-3 control-label"><h3>File</h3></label>
        <div class="col-sm-6">
        <input type="file" name="txt_file" class="form-control" />
        </div>
        </div>
          
            <div class="form-group">
        <label class="col-sm-3 control-label"><h3>size</h3></label>
        <div class="col-sm-6">
        <input type="text" name="size" class="form-control" placeholder="enter sizes" />
        </div>
        </div>
        <div class="form-group">
        <label class="col-sm-3 control-label"><h3>Description</h3></label>
        <div class="col-sm-6">
        <input type="text" name="description" class="form-control" placeholder="enter description" />
        </div>
        </div>
          
        <div class="form-group">
        <div class="col-sm-offset-3 col-sm-9 m-t-15">
        <h3><input type="submit"  name="btn_insert" class="btn btn-success " value="Insert"></h3>
        <a href="order-history.php" class="btn btn-danger"><h3>back</h3></a>
        </div>
        </div>
          
      </form>
      
    </div>
    
  </div>
      
  </div>
                    
  </body>
</html>

</form>
</div>