<script type="text/javascript">
function viewdata(){
    <?php 

    	$view="Select * from basicdetails";
        $result=mysqli_query($con,$view);
        $p=0;
        while($row=mysqli_fetch_array($result)){
            for($i=0;$i<4;$i++)
            {
        	  $arr[$p][$i]=$row[$i];
            }
            $p++;
        }
    ?>
	var users=<?php echo json_encode($arr);?>;
    console.log(users.length);
    users.forEach(function(item){
        document.getElementById('viewData').innerHTML+="<tr><td>"+item[0]+"</td><td>"+item[1]+"</td><td>"+item[2]+"</td><td>"+item[3]+"</td><td><button type='button' class='btn btn-default' data-dismiss='modal'  data-target='#myModal' value="+item+" data-toggle='modal' onclick='editDelete(this.value)'>Edit/Delete</button></td></tr>";
    })
}
</script>