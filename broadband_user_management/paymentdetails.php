<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include 'classes/User.php';?>
<?php include_once 'helpers/Format.php';?>

<?php 
$us=new User();
$fm=new Format();

if(!isset($_GET['userid']) || $_GET['userid']== NULL) {
       echo "<script> window.location='userlist.php';</script>";
       }

       else{
         
        $id = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['userid']);


       }

if (isset($_GET['del_month'])) {
       		$month_id = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['del_month']);
       	    $user_id = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['userid']);
       	    
            $DeletePaymentByMonth =$us->DeletePaymentByMonth($month_id,$user_id);
       	
       }
        
?>




<div class="grid_10">
    <div class="box round first grid">
        <h2>Payment List</h2>
        <div class="block">
        <div class="table-responsive">   
        		<?php 
        		     if (isset($DeletePaymentByMonth)) {
        		      echo $DeletePaymentByMonth;
        		     }

        		 ?>
            <table class="table table-striped table-bordered" id="user_data">
			<thead>
				<tr>
					<th>SL</th>
					<th>User Name</th>
					<th>Month</th>
					<th>Date</th>					
					<th>package</th>
					<th>Pay Amount</th>
					<th>Due</th>
					<th>Comment</th>					
					<th>Update Payment</th>
					

					
					
				</tr>
			</thead>
			<tbody>
					<?php
					$getALLPaymentById = $us->getALLPaymentById($id);
					if ($getALLPaymentById) {
						$i=0;
						$total_due= 0;
						while ($result = $getALLPaymentById->fetch_assoc()) {
							$i++;
							
					?>

				<tr class="odd gradeX">
					<td><?php echo $i;?></td>
					<td><?php echo $result['user_name'];?></td>
					<td><?php echo $result['month_name'];?></td>
					<td><?php echo $fm->formatDate($result['date']);?></td>
					
					<td><?php echo $result['packeg_price'];?></td>
					<td><?php echo $result['amount'];?>/=</td>
					<td><?php
					 
					  if($result['packeg_price']>$result['amount']){
					  	$due = $result['packeg_price'] -$result['amount'];
					  	echo $due.'/=';

					  	}

				
					?></td>
					<td><?php echo $fm->textShorten($result['comment'],30);?></td>

				<td><a href="paymentedit.php?month_id=<?php echo $result['month_id']?>&userid=<?php echo $result['user_id']?>&date=<?php echo $result['date']?>"><button type="button" class="btn btn-primary">Update</button></a>  <a onclick="return confirm('Are you sure to Delete !')" href="?del_month=<?php echo $result['month_id']?>&userid=<?php echo $result['user_id']?>"><button type="button" class="btn btn-danger">Delete</button></a></td>

				</tr>

				

				                 <?php
				                 if (!empty($due)) {
				                 	$total_due = $total_due + $due;
				                 }
                                       
                                      
                                    ?>
                                 
				                  
				<?php }}?>

			</tbody>

		</table>

		             <tr>
                          <td>
                            <label>Total Due :</label>
                          </td>
                            <td>
                              <input type="text"  value="<?php 
                               if (!empty($total_due)) {
                                echo $total_due."/=";
                               } else{
                                echo "There has No Due yet ";
                               }?>" />

                                
                            </td>
                        </tr>

		
		            

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
