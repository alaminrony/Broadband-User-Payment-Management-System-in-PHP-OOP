<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include 'classes/User.php';?>
<?php include_once 'helpers/Format.php';?>
<?php
$us = New User();
$fm = New Format();
?>


<div class="grid_10">
    <div class="box round first grid">
        <h2>ALL Payment List</h2>
        <div class="block">
         <div class="col-md-3">  
                     <input type="text" name="from_date" id="from_date" class="form-control" placeholder="From Date" />  
                </div>  
                <div class="col-md-3">  
                     <input type="text" name="to_date" id="to_date" class="form-control" placeholder="To Date" />  
                </div>  
                <div class="col-md-5">  
                     <input type="button" name="filter" id="filter" value="Filter" class="btn btn-info" />  
                </div>  
                <div style="clear:both"></div>                 
                <br />  
                <div id="order_table">  
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
                    $getALLPaymentByDate  = $us->getALLPaymentByDate();
                    if ($getALLPaymentByDate) {
                      $i=0;
                      $total=0;
                      while ($result = $getALLPaymentByDate->fetch_assoc()) {
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
                            <label>Grand Total Amount:</label>
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

                  


                </div>  
           </div>  
        </div>    
      </body>  
 </html>  

<script>  
 $(document).ready(function(){  
      $('#user_data').DataTable();  
 });  
 </script>

 <script>  
      $(document).ready(function(){  
           $.datepicker.setDefaults({  
                dateFormat: 'dd-mm-yy'  

           });  
           $(function(){  
                $("#from_date").datepicker();  
                $("#to_date").datepicker();  
           });  
           $('#filter').click(function(){  
                var from_date = $('#from_date').val();  
                var to_date = $('#to_date').val();  
                if(from_date != '' && to_date != '')  
                {  
                     $.ajax({  
                          url:"filter.php",  
                          method:"POST",  
                          data:{from_date:from_date, to_date:to_date},  
                          success:function(data)  
                          {  
                               $('#order_table').html(data);  
                          }  
                     });  
                }  
                else  
                {  
                     alert("Please Select Date");  
                }  
           });  
      });  
 </script>

<?php include 'inc/footer.php';?>
