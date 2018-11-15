<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include 'classes/User.php';?>

<?php

 $us =new User();
  if($_SERVER['REQUEST_METHOD'] =='POST' && isset($_POST['submit'])){
     $UserInsert = $us->UserInsert($_POST);
  }

?>


<div class="grid_10">
    <div class="box round first grid">
        <h2>Add New User</h2>
        <div class="block">   

                <?php
                  if(isset($UserInsert)){
                    echo $UserInsert;

                  }


                ?>             
         <form action="" method="post" enctype="multipart/form-data">
            <table class="form">
               
                <tr>
                    <td>
                        <label> User Name</label>
                    </td>
                   
                    <td>
                        <input type="text" name="user_name" placeholder="Enter User Name." class="medium" />
                    </td>
                </tr>

                <tr>
                    <td>
                        <label>Address</label>
                    </td>
                    
                    <td>
                        <input type="text" name="address" placeholder="Enter User address." class="medium" />
                    </td>
                </tr>





                <tr>
                    <td>
                        <label>Phone Number</label>
                    </td>
                    
                    <td>
                        <input type="text" name="phone" placeholder="Enter Phone Number." class="medium" />
                    </td>
                    
                
                 

                <tr>
                    <td>
                        <label>Package Price</label>
                    </td>
                   
                    <td>
                        <input type="text" name="price" placeholder="Enter Price." class="medium" />
                    </td>
                </tr>

                <tr>
                    <td>
                        <label>Box Number</label>
                    </td>
                    
                    <td>
                        <input type="text" name="box_num" placeholder="Enter Box Number." class="medium" />
                    </td>
                </tr>

                <tr>
                    <td>
                        <label>Under By</label>
                    </td>

                    <td>
                        <input type="text" name="under_by" placeholder="Enter under By name." class="medium" />
                    </td>
                </tr>
            
                
                
                

                <tr>
                    <td></td>
                    <td>
                        <input class="btn btn-secondary" type="submit" name="submit" Value="Save" />
                    </td>
                </tr>
            </table>
            </form>
        </div>
    </div>
</div>

<?php include 'inc/footer.php';?>


