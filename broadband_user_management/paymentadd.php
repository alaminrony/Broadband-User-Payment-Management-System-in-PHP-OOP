<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include 'classes/User.php';?>


<?php

if(!isset($_GET['userid']) || $_GET['userid']== NULL) {
       echo "<script> window.location='userlist.php';</script>";
     }
  
       else{
            
 
        $id = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['userid']);

       }


  $us=new User();
  if($_SERVER['REQUEST_METHOD'] =='POST' && isset($_POST['submit'])){
    
     $paymentAdd = $us->PaymentAdd($_POST, $id);
  }

?>

        <div class="grid_10">
            <div class="box round first grid">
              <?php
              $us = new User();
                $getUserById=$us->getUserById($id);
            if ($getUserById) {
              while ($result =$getUserById->fetch_assoc()) {


           ?>
                <h2>Add Payment for <?php echo $result['user_name'];?></h2>

              <?php } }?>
               <div class="block copyblock">

                 <?php
                    if(isset($paymentAdd)){
                        echo $paymentAdd;

                    }
                 
                 ?> 

    

                 <form action=" " method="post">
                    <table class="form">

                <?php
                    $us = new User();
                    $getUserById=$us->getUserById($id);
                         if ($getUserById) {
                         while ($result =$getUserById->fetch_assoc()) {


                 ?>	
                 <tr>
                          <td>
                            <label>User Name : </label>
                          </td>

                          <td>
                                <input type="text" name="user_name" value="<?php echo $result['user_name'];?>" readonly class="medium" />
                          </td>
                          
                    </tr>   




                    <tr>
                          <td>
                            <label>Packege Price : </label>
                          </td>

                          <td>
                                <input type="text" name="packeg_price" value="<?php echo $result['price'];?>/=" readonly class="medium" />
                          </td>
                          
                    </tr>		
                  <?php  } }?>
                    
                        <tr>
                            <td>
                              <label>Month :</label>
                            </td>
                            <td>
                              <select name="month_name">
                                <option>Select Month</option> 
                                <option value="January">January</option>                   
                                <option value="February ">February </option>
                                <option value="March">March</option>
                                <option value="April">April</option>
                                <option value="May">May</option>
                                <option value="June">June</option>
                                <option value="July">July</option>
                                <option value="August">August</option>
                                <option value="September">September</option>
                                <option value="October">October</option>
                                <option value="November">November</option>
                                <option value="December">December</option>
                              </select>
                            </td>
                        </tr>

                        <tr>
                          <td>
                            <label>Bill Amount :</label>
                          </td>
                            <td>
                                <input type="text" name="amount" placeholder="Enter Bill Amount" class="medium" />
                            </td>
                        </tr>

                        <tr>
                          <td>
                            <label>Comment :</label>
                          </td>
                            <td>
                              <textarea rows="2" cols="30" name="comment">

                                  </textarea>

                                
                            </td>
                        </tr>

                         <?php
                            $us = new User();
                            $getUserById=$us->getUserById($id);
                                 if ($getUserById) {
                                 while ($result =$getUserById->fetch_assoc()) {
                                  ?>


                  


						             <tr> 
                          <td><a href="paymentdetails.php?userid=<?php echo $result['user_id']?>"> <button type="button" class="btn btn-warning">View Payment Details</button></a></td>
                        <?php }}?>

                            <td>
                              <input class="btn btn-secondary" type="submit" name="submit" value="Save">
                                
                            </td>
                        </tr>

                    </table>

                
                    </form>
                    

                </div>



            </div>

        </div>
<?php include 'inc/footer.php';?>