<?php include 'classes/User.php';?>
<?php  

 $us = New User();

 if(isset($_POST["from_date"], $_POST["to_date"])){
     $filterdata=$us->filterByDate();

 } 
      
?>
           <table class="table table-striped table-bordered" id="user_data">  
                     <thead> 
                          <tr>  
                               <th>SL</th>   
                               <th>User Name</th>  
                               <th>Month</th>  
                               <th>Date</th>  
                               <th>Amount</th>  
                          </tr> 
                      </thead>     
                  <?php
                   $filterdata=$us->filterByDate();
                    if ($filterdata) {
                      $i=0;
                      $total=0;
                      while ($result = $filterdata->fetch_assoc()) {
                        $i++;
                        ?>
              
                  
                     
                          <tr>  
                               <td><?php echo $i; ?></td>
                               <td><?php echo $result["user_name"]; ?></td>  
                               <td><?php echo $result["month_name"]; ?></td>  
                               <td><?php echo $result["date"]; ?></td>  
                               <td><?php echo $result["amount"];?>/=</td>  
                          </tr>


                           <?php
                             if (!empty($result["amount"])) {
                              $total = $total + $result["amount"];
                               
                             }
                          ?>

                          <?php  }}?>  

                     </table> 


                     <tr>
                          <td>
                            <label>Total Amount :</label>
                          </td>
                            <td>
                              <input type="text"  value="<?php 
                               if (!empty($total)) {
                                echo $total."/=";
                               } else{
                                echo "There has No Total yet ";
                               }?>" />

                                
                            </td>
                        </tr>

     