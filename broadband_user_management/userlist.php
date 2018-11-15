<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include 'classes/User.php';?>
<?php include_once 'helpers/Format.php';?>



<?php 
$us=new User();
$fm=new Format();

if(isset($_GET['deluser'])){

      	$id = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['deluser']);
      	 $deluser   =$us->delUserById($id);
      }

?>

<div class="grid_10">

    <div class="box round first grid">
        <h2>User List</h2>
        <div class="block">
        
        <div class="table-responsive">  
        		<?php 
        		     if (isset($deluser)) {
        		      echo $deluser;
        		     }

        		 ?>
            <table class="table table-striped table-bordered" id="user_data">
			<thead>
				<tr>
					<th>SL</th>
					<th>User Name</th>
					<th>Address</th>
					<th>Phone</th>					
					<th>Price</th>
					<th>Box</th>					
					<th>Under</th>
					<th>Add Payment</th>
					<th>Payment</th>
					<th>Update Info</th>
					
					
					
					
				</tr>
			</thead>
			<tbody>
					<?php
					$getAllUsers  = $us->getAllUsers();
					if ($getAllUsers) {
						$i=0;
						while ($result = $getAllUsers->fetch_assoc()) {
							$i++;
							
					?>

				<tr class="odd gradeX">
					<td><?php echo $i;?></td>
					<td><?php echo $result['user_name'];?></td>
					<td><?php echo $result['address'];?></td>
					<td><?php echo $result['phone'];?></td>
					<td><?php echo $result['price'];?>/=</td>
				    <td><?php echo $result['box_num'];?></td>
				    <td><?php echo $result['under_by'];?></td>
				    <td><a href="paymentadd.php?userid=<?php echo $result['user_id']?>"><button type="button" class="btn btn-info">Add Payment</button></a></td>

				    <td><a href="paymentdetails.php?userid=<?php echo $result['user_id']?>"> <button type="button" class="btn btn-warning">Details</button></a></td>

								
					 
					<td><a href="useredit.php?userid=<?php echo $result['user_id'];?>"><button type="button" class="btn btn-primary">Update</button></a> <a onclick="return confirm('Are you sure to Delete !')" href="?deluser=<?php echo $result['user_id'];?>"> <button type="button" class="btn btn-danger">Delete</button></a></td>

                 
				</tr>
				<?php }}?>

			</tbody>
		</table>

       </div>
    </div>
</div>
</div>


<script>  
 $(document).ready(function(){  
      $('#user_data').DataTable();  
 });  
 </script>





<?php include 'inc/footer.php';?>
