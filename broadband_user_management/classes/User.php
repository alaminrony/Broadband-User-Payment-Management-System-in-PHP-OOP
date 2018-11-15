<?php 
   $filepath = realpath(dirname(__FILE__));

    include_once ($filepath.'/../lib/Database.php');
    include_once ($filepath.'/../helpers/Format.php');
?>



<?php
class User{
	 private $db;
	 private $fm;
	
	 public function __construct(){
		$this->db=new Database();
		$this->fm=new Format();
	}


	public function UserInsert($data){

		$user_name    =mysqli_real_escape_string($this->db->link, $data['user_name']);
		$address    =mysqli_real_escape_string($this->db->link, $data['address']);
		$phone          =mysqli_real_escape_string($this->db->link, $data['phone']);
		$price        =mysqli_real_escape_string($this->db->link, $data['price']);
		$box_num           =mysqli_real_escape_string($this->db->link, $data['box_num']);
       $under_by           =mysqli_real_escape_string($this->db->link, $data['under_by']);

		    if($user_name == '' ||$address == '' || $phone == '' || $price  == '' || $box_num  == '' || $under_by== '' ){
		    	$msg = "<span class='error'> fields must not be empty !! </span>";
        	    return $msg;

		    }
		    else{
		     
		    	$query= "INSERT INTO user_info(user_name, address, phone, price,box_num,under_by ) 
		    	VALUES('$user_name','$address', '$phone','$price','$box_num','$under_by')";

        	    $inserted_row =$this->db->insert($query);
        	               if($inserted_row){
        		           $msg ="<span class='success'> User Information insert successfully. </span>";
        		           return $msg;
        	               }

        	             
				        	
				 }
			}


	public function getAllUsers(){
		$query = "SELECT * FROM user_info ORDER BY user_id";
         $result = $this->db->select($query);
        return $result;
        

	}

	public function getUserById($id){
		$query =  "SELECT * FROM user_info where user_id='$id'";
		$result = $this->db->select($query);
        return $result;

	}


	 public function TransferUserPriceById($id){
        $query =  "SELECT * FROM user_info where user_id='$id'";
        $getPrice = $this->db->select($query);
        if ($getPrice) {
        	while ($result = $getProduct->fetch_assoc()){
        		$price =$result['price']; 
        		"INSERT INTO payment(packeg_price) 
                 VALUES('$price')";

              $inserted_row =$this->db->insert($query);
        	}
        	
        }
    }


      



    public function UserUpdate($data,$id){
    	$user_name    =mysqli_real_escape_string($this->db->link, $data['user_name']);
		$address    =mysqli_real_escape_string($this->db->link, $data['address']);
		$phone          =mysqli_real_escape_string($this->db->link, $data['phone']);
		$price        =mysqli_real_escape_string($this->db->link, $data['price']);
		$box_num           =mysqli_real_escape_string($this->db->link, $data['box_num']);
       $under_by           =mysqli_real_escape_string($this->db->link, $data['under_by']);
       
		  
  if($user_name == '' ||$address == '' || $phone == '' || $price  == '' || $box_num  == '' || $under_by== '' ){
		    	$msg = "<span class='error'> fields must not be empty !! </span>";
        	    return $msg;

		    }
		      else{
					

					    	$query= "UPDATE user_info
					    	         SET 
					    	         user_name = '$user_name',
					    	         address = '$address',
					    	         phone = '$phone',
					    	         price = '$price',
					    	         box_num       = '$box_num',
					    	         under_by     = '$under_by'
					    	         
					    	        
					    	         WHERE user_id ='$id' ";


			        	    $update_row =$this->db->update($query);
			        	               if($update_row){
			        		           $msg ="<span class='success'> User Update successfully. </span>";
			        		           return $msg;
			        	               }

			        	               else {
			                          echo "<span class='error'>User Not Update !</span>";
							          }
							        }
							        
							        }  
				       
				 
         
            
    

         

        public function delUserById($id){
    
           $delquery ="DELETE from user_info where user_id='$id'";
		         $delData  =$this->db->delete($delquery);

		         if($delData){
		                $msg ="<span class='success'> User Deleted successfully. </span>";
		                return $msg;
		            }
		            else{
		                $msg ="<span class='error'> User Not Deleted . </span>";
		                return $msg;
		            }   

		    }


      public function PaymentAdd($data,$id){
      	$packeg_price    =mysqli_real_escape_string($this->db->link, $data['packeg_price']);
		$month_name          =mysqli_real_escape_string($this->db->link, $data['month_name']);
		$user_name          =mysqli_real_escape_string($this->db->link, $data['user_name']);
		$amount        =mysqli_real_escape_string($this->db->link, $data['amount']);
		$comment        =mysqli_real_escape_string($this->db->link, $data['comment']);
          

		    	if( $month_name == '' || $user_name=='' || $amount  == '' ){
		    	$msg = "<span class='error'> fields must not be empty !! </span>";
        	    return $msg;

		    }
		    else{
		     
		    	$query= "INSERT INTO payment(month_name,user_id,user_name,packeg_price,amount,comment) 
		    	VALUES('$month_name','$id','$user_name','$packeg_price','$amount','$comment')";

        	    $inserted_row =$this->db->insert($query);
        	               if($inserted_row){
        		           $msg ="<span class='success'> User Payment insert successfully. </span>";
        		           return $msg;
        	               }

        	             
				        	
				 }
		    }



		    public function getALLPaymentById($id){ 

		    	$query = "SELECT * FROM payment Where user_id='$id' ORDER BY month_id ASC";
		    	 $result = $this->db->select($query);
                 return $result;

		    }

		     public function getSinglePriceById($id){ 

		    	$query = "SELECT price FROM payment Where user_id='$id'";
		    	 $result = $this->db->select($query);
                 return $result;

		    }

		    public function getSinglePaymentByMonth($id){
		    	$query = "SELECT * FROM payment WHERE month_id='$id' ";
		    	 $result = $this->db->select($query);
                 return $result;

		    }



		  public function paymentUpdateByMonth($data,$month_id,$user_id,$date){		     
		    $month_name   =mysqli_real_escape_string($this->db->link, $data['month_name']);
		    $date   =mysqli_real_escape_string($this->db->link, $data['date']);
		    $packeg_price   =mysqli_real_escape_string($this->db->link, $data['packeg_price']);
		    $amount   =mysqli_real_escape_string($this->db->link, $data['amount']);
		    $comment   =mysqli_real_escape_string($this->db->link, $data['comment']);
       
		  
            if($month_name == '' || $date == '' ||$packeg_price=='' || $amount == '' || $comment=='' ){
		    	$msg = "<span class='error'> fields must not be empty !! </span>";
        	    return $msg;

		    }
		      else{
					

					    	$query= "UPDATE payment
					    	         SET 
					    	         month_name = '$month_name',
					    	         date       = '$date',
					    	         packeg_price='$packeg_price',
					    	         amount       = '$amount',
					    	         comment      = '$comment'
					    	         
					    	         where month_id='$month_id' AND user_id='$user_id' AND date='$date'";


			        	    $update_row =$this->db->update($query);
			        	               if($update_row){
			        		           $msg ="<span class='success'>Payment Update successfully. </span>";
			        		           return $msg;
			        	               }

			        	               else {
			                          echo "<span class='error'>Payment Not Update !</span>";
							          }
							        }
			
		                        }

		      public function DeletePaymentByMonth($month_id,$user_id){
		      	 $delquery ="DELETE from payment where month_id='$month_id' AND user_id='$user_id'";
		         $delData  =$this->db->delete($delquery);

		         if($delData){
		                $msg ="<span class='success'>Payment Deleted successfully. </span>";
		                return $msg;
		            }
		            else{
		                $msg ="<span class='error'>Payment Not Deleted . </span>";
		                return $msg;
		            }   


		      } 


		   public function getALLPaymentByDate(){
		   	$query = "SELECT * FROM payment ORDER BY date" ;
		   	$result = $this->db->select($query);
		   	return $result;
		   }  

          public function filterByDate(){
          	 $query = " SELECT * FROM payment  
           WHERE date BETWEEN '".$_POST["from_date"]."' AND '".$_POST["to_date"]."' "; 
           	$result = $this->db->select($query);
		   	return $result;
          }

	

}
?>

