  <?php
  $view="Select * from basicdetails";
                      $result=mysqli_query($con,$view);
                      while($row=mysqli_fetch_array($result)){
                      ?><tr>
                          <td name="<?php echo $row[0] ?>"><?php echo $row[0]?></td>
                          <td><?php echo $row[1]?></td>
                          <td><?php echo $row[2]?></td>
                          <td><?php echo $row[3]?></td>
                          <td><button type="button" class="btn btn-default" data-dismiss="modal"  data-target="#myModal" value="<?php echo $row[0].'+'.$row[1].'+'.$row[2].'+'.$row[3]?>" data-toggle="modal" onclick="editDelete(this.value)">Edit/Delete</button></td>
                      <?php
                    }
                    ?>





                    <?php
                      $view="Select * from basicdetails";
                      $result=mysqli_query($con,$view);
                      while($row=mysqli_fetch_array($result)){
                      ?><tr>
                          <td name="<?php echo $row[0] ?>"><?php echo $row[0]?></td>
                          <td><?php echo $row[1]?></td>
                          <td><?php echo $row[2]?></td>
                          <td><?php echo $row[3]?></td>
                          <td><button type="button" class="btn btn-default" data-dismiss="modal"  data-target="#myModal" value="<?php echo $row[0].'+'.$row[1].'+'.$row[2].'+'.$row[3]?>" data-toggle="modal" onclick="editDelete(this.value)">Edit/Delete</button></td>
                      <?php
                    }
                    ?>




                    <?php 
    include("database.php");
    $userArray = array('John Doe', 'john@example.com');
?>


function kkkview(){
   <?php
      $view="Select * from basicdetails";
      $result=mysqli_query($con,$view);
      while($row=mysqli_fetch_array($result)){
        ?>document.getElementById('viewData').innerHTML+="<tr><td><?php echo $row[0] ?></td><td><?php echo $row[1] ?></td><td><?php echo $row[2] ?></td><td><?php echo $row[3] ?></td><td><button type='button' class='btn btn-default' data-dismiss='modal'  data-target='#myModal' data-toggle='modal' onclick='editDelete(this.value)'>Edit/Delete</button></td></tr>";<?php

      }
  ?>