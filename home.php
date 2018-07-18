<!DOCTYPE html>
<html lang="en">
  <head>
    <?php 
    include("database.php");
    ?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>
    <!-- Latest compiled and minified CSS -->
          <link rel="stylesheet" href="css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
          <link rel="stylesheet" type="text/css" href="styleUpdate.css">
          <!-- Optional theme -->
          <link rel="stylesheet" href="css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
          <!-- Latest compiled and minified JavaScript -->
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
          <script src="js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  </head>
  <body>
     <nav class="navbar navbar-default">
        <div class="container-fluid">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Brand</a>
          </div>
          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
              <li class="active"><a href="#">Home <span class="sr-only">(current)</span></a></li>
              <li><a href="#">Team</a></li>
              <li><a href="#">Menu</a></li>
              <li><a href="#">Contact</a></li>
            </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Link</a></li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>
  <div class="col-md-12">
    <div class="col-md-6 border">
        <img src="flower.jpg" />
    </div>
        <div class="col-md-4 border center" >
        <form class="form-block" method="post">
          <div class="form-group">
            <h4>Login</h4>
            <label class="sr-only" for="exampleInputEmail3">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail3" placeholder="Email" name="username">
          </div>
          <div class="form-group">
            <label class="sr-only" for="exampleInputPassword3">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword3" placeholder="Password" name="password">
          </div>
          <div class="checkbox">
            <label>
              <input type="checkbox"> Remember me
            </label>
          </div> 
          <button type="submit" class="btn btn-default" name="login">Sign in</button>
        </form>
          <div class="paddings"  id="login">
          <p class="lead">When you want to take control of your life and make the most of everything around you</p>
          </div>
      </div>
    </div>
  </body>
</html>
<script type="text/javascript">
function alertError(){
  document.getElementById('login').innerHTML+="<div class='alert alert-warning alert-dismissible' role='alert'>
  <strong>Warning!</strong> Better check yourself, you're not looking too good.</div>";
}

</script>
<?php 
  if(isset($_POST['login'])){
    $username=$_POST['username'];
    $password=$_POST['password'];
    $view="Select * from login";
    $result=mysqli_query($con,$view);
    $row=mysqli_fetch_array($result);
    if($username==$row[1]&&$password==$row[2]){
      echo "<script>window.location='firstpage.php';</script>";
    }
    else{
      echo "<script>alertError();</script>";
    }

  }
?>
