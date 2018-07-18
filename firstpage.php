<!DOCTYPE html>
<html lang="en">
  <head>
    <?php 
    include("database.php");
    include("jsonencode.php");
    ?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Student Information System</title>
    <!-- Latest compiled and minified CSS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="styleUpdate.css">
    <!-- Optional theme -->
    <link rel="stylesheet" href="css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <!-- Latest compiled and minified JavaScript -->
    <script src="js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  </head>
  <body>
     <nav class="navbar navbar-default navbar-static-top">
      <div class="container">
        <ul class="nav navbar-nav navbar-left">
            <li><p class="lead pTop">Student Information System</p></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="home.php">Logout</a></li>
        </ul>
      </div>
    </nav>
    <div class="container">
      <div class="jumbotron">
        <h2>Welcome To S.M.S</h2>
        <p>A student is a person who is learning something. Students can be children, teenagers, or adults who are going to school, but it may also be other people who are learning, such as in college or university. Another word for student is pupil. Usually, students will learn from a teacher or a lecturer if at university</p>
        <p><!-- Button trigger modal -->
          <button type="button" class="btn btn-primary btn-lg btn-width" data-toggle="modal" data-target="#myModal" data-backdrop="static">
            Insert
          </button>
          <!-- Modal -->
          <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="myModalLabel">Add Student Information</h4>
                </div>
                <div class="modal-body">
                  <form method="post" id="firstForm" onsubmit="return validateForm()">
                    <div class="form-group">
                      <input type="hidden" class="form-control" id="editId" placeholder="Name" name='editId'>
                      <label for="exampleInputEmail1">Name</label>
                      <input type="text" class="form-control" id="name" placeholder="Name" name='name'>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Class</label>
                      <input type="text" class="form-control" placeholder="Class" id="class" name='class'>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Mobile No</label>
                      <input type="text" class="form-control"  placeholder="Mobile" id="mobile" name='mobile'>
                    </div>
                    <button type="submit" class="btn btn-default" name="submits" id="submitBtn" >Submit</button>
                    <button type="submit" class="btn btn-default" name="delete" id="deleteBtn" style="visibility:hidden" >Delete</button>
                  </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div></p>
        <p><!-- Button trigger modal -->
          <button type="button" class="btn btn-primary btn-lg btn-width" data-toggle="modal" data-target="#viewModal" onClick="viewdata()">
            View
          </button>
          <!-- Modal -->
          <div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                  <table class="table" id="viewData">
                    <tr>
                      <th>No</th>
                      <th>Name</th>
                      <th>Class</th>
                      <th>Phone</th>
                      <th>Edit/Delete</th>
                    </tr>
                  </table>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div></p>
      </div>
    </div>
    <!--mahesh ---------------------  -->
  </body>
  </html>
<?php
    if(isset($_POST['submits'])){ 
       $name=$_POST['name'];
       $class=$_POST['class'];
       $mob=$_POST['mobile'];
       $view="Select * from basicdetails where mobile=$mob";
       $result=mysqli_query($con,$view);
       if(mysqli_fetch_array($result)){
        echo "<script>alert('Mobile Number already exists !')</script>";
       }
       else{
           $insert="INSERT INTO basicdetails (name,class,mobile) VALUES('$name','$class',$mob)";
           $result = mysqli_query($con,$insert)
                or die("Error: ".mysqli_error());
           echo "<script>window.location='firstpage.php';</script>";
           echo "hii";
       }
      }
    if(isset($_POST['editSubmit'])){
      $i=$_POST['editId'];
      $name=$_POST['name'];
      $class=$_POST['class'];
      $mob=$_POST['mobile'];
      $qry="UPDATE basicdetails SET name='$name',class='$class',mobile=$mob WHERE id=$i";
      $result = mysqli_query($con,$qry)
                or die("Error: ".mysqli_error());
      echo "<script>document.getElementById('submitBtn').name='submits'; document.getElementById('deleteBtn').style.visibility='hidden';window.location='firstpage.php';</script>";
    }
    if(isset($_POST['delete'])){
    $i=$_POST['editId'];
    $qry="delete from basicdetails where id=$i";
    $result = mysqli_query($con,$qry)
                or die("Error: ".mysqli_error());
    echo "<script>document.getElementById('deleteBtn').style.visibility='hidden';window.location='firstpage.php';</script>";
    }
?>
<script type="text/javascript">
  function editDelete(i){
    var res = i.split(",");
    document.getElementById('editId').value=res[0];
    document.getElementById('name').value=res[1];
    document.getElementById('class').value=res[2];
    document.getElementById('mobile').value=res[3];
    document.getElementById('submitBtn').name="editSubmit";
    document.getElementById('deleteBtn').style.visibility="visible";
  }
  function validateForm() {
    if (document.forms["firstForm"]["name"].value == "") {
        alert("Name must be filled out");
        return false;
    }
    if (document.forms["firstForm"]["class"].value == "") {
        alert("Class must be filled out");
        return false;
    }
    if (document.forms["firstForm"]["mobile"].value == "") {
        alert("Name must be filled out");
        return false;
    }

}
</script>

