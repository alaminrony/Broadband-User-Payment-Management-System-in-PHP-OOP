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
     $updateUser = $us->UserUpdate($_POST,$id);
  }

?>


<div class="grid_10">
    <div class="box round first grid">
        <h2>Update User Information</h2>
        <div class="block">   

                <?php
                  if(isset($updateUser)){
                    echo $updateUser;

                  }
                ?>   

               <?php
                    $getUser  = $us->getUserById($id);
                    if($getUser ){
                      while ($value= $getUser->fetch_assoc()) {
                        
                     

                 ?>        
         <form action="" method="post" enctype="multipart/form-data">
            <table class="form">
                 <tr>
                    <td>
                        <label>User Name:</label>
                    </td>
                    <td>
                        <input type="text" name="user_name" value="<?php echo $value['user_name'];?>" class="medium" />
                    </td>
                </tr>

                 <tr>
                    <td>
                        <label>Address:</label>
                    </td>
                    <td>
                        <input type="text" name="address" value="<?php echo $value['address'];?>" class="medium" />
                    </td>
                </tr>


                 <tr>
                    <td>
                        <label>Phone:</label>
                    </td>
                    <td>
                        <input type="text" name="phone" value="<?php echo $value['phone'];?>" class="medium" />
                    </td>
                </tr>

                <tr>
                    <td>
                        <label>Price:</label>
                    </td>
                    <td>
                        <input type="text" name="price" value="<?php echo $value['price'];?>" class="medium" />
                    </td>
                </tr>

                <tr>
                    <td>
                        <label>Box Numner:</label>
                    </td>
                    <td>
                        <input type="text" name="box_num" value="<?php echo $value['box_num'];?>" class="medium" />
                    </td>
                </tr>

                <tr>
                    <td>
                        <label>Under By:</label>
                    </td>
                    <td>
                        <input type="text" name="under_by" value="<?php echo $value['under_by'];?>" class="medium" />
                    </td>
                </tr>



               <tr>
                    <td><a href="userlist.php"><button type="button" class="btn btn-info"><< Back to User List</button></a></td>

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


