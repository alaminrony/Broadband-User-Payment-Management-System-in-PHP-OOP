<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include 'classes/User.php';?>
<?php
if(!isset($_GET['month_id']) || $_GET['month_id']== NULL) {
       echo "<script> window.location='userlist.php';</script>";
       }

       else{
         
        $id = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['month_id']);


       }

?>


<?php

$us=new User();
if (isset($_GET['month_id'])) {
          $month_id = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['month_id']);
            $user_id = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['userid']);
            $date = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['date']);
          }

  
  
   if($_SERVER['REQUEST_METHOD'] =='POST' && isset($_POST['submit'])){
     $paymentUpdateByMonth = $us->paymentUpdateByMonth($_POST,$month_id,$user_id,$date);        
        
       }


?>


<div class="grid_10">
    <div class="box round first grid">
         
                <h2>Update Payment</h2>

              
        <div class="block">   

                <?php
                  if(isset($paymentUpdateByMonth)){
                    echo $paymentUpdateByMonth;

                  }
                ?>   

               <?php
                    $getSinglePaymentByMonth  = $us->getSinglePaymentByMonth($id);
                    if($getSinglePaymentByMonth ){
                      while ($value= $getSinglePaymentByMonth->fetch_assoc()) {
                        
                     

                 ?>        
         <form action="" method="post" enctype="multipart/form-data">
            <table class="form">


              <tr>
                    <td>
                        <label>User Name</label>
                    </td>
                    <td>
                        <input type="text" name="user_name" value="<?php echo $value['user_name'];?>" class="medium" readonly/>
                    </td>
                </tr>


                 <tr>
                    <td>
                        <label>Month Name</label>
                    </td>
                    <td>
                        <input type="text" name="month_name" value="<?php echo $value['month_name'];?>" class="medium" />
                    </td>
                </tr>

                 <tr>
                    <td>
                        <label>Date</label>
                    </td>
                    <td>
                        <input type="text" name="date" value="<?php echo $value['date'];?>" class="medium" readonly/>
                    </td>
                </tr>


                 <tr>
                    <td>
                        <label>Packeg Price</label>
                    </td>
                    <td>
                        <input type="text" name="packeg_price" value="<?php echo $value['packeg_price'];?>" class="medium" readonly/>
                    </td>
                </tr>

                <tr>
                    <td>
                        <label>Pay Amount</label>
                    </td>
                    <td>
                        <input type="text" name="amount" value="<?php echo $value['amount'];?>" class="medium" />
                    </td>
                </tr>

                     <tr>
                          <td>
                            <label>Comment :</label>
                          </td>
                            <td>
                              <input type="text" name="comment" value="<?php echo $value['comment'];?>" class="medium" />

                                
                            </td>
                        </tr>

                  <tr> 
                       <td></td>
                       <td>
                        <input class="btn btn-secondary" type="submit" name="submit" Value="Update" />
                    </td>
                </tr>

            </table>
            </form>

                     <?php }}?>


        </div>

    </div>
</div>

<?php include 'inc/footer.php';?>


