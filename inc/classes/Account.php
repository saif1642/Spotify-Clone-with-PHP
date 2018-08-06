<?php
    /**
     * 
     */
    class Account 
    {
    	private $err_array;
    	public function __construct()
    	{
    		$this->$err_array = array();
    	}
    	public function register($un,$fn,$ln,$em,$em2,$pw,$pw2){
    		$this->validateUsername($un);
    		$this->validateFirstname($fn);
    		$this->validateLastName($ln);
    		$this->validateEmails($em,$em2);
    		$this->validatePassword($pw,$pw2);
    	}
       private function validateUsername($un){
       	  if(strlen($un) > 25 || strlen($un) < 5){
                array_push($this->$err_array, "Your Username must be between 5 and 25 character");
                return;
       	  }

	   }
	   private function validateFirstname($fn){
           if(strlen($fn) > 25 || strlen($fn) < 2){
                array_push($this->$err_array, "Your Firstname must be between 2 and 25 character");
                return;
       	   }
	   }
	   private function validateLastName($ln){
            if(strlen($ln) > 25 || strlen($ln) < 2){
                array_push($this->$err_array, "Your Lastname must be between 2 and 25 character");
                return;
       	     }
	   }
	   private function validateEmails($em,$em2){
            if($em != $em2){
            	array_push($this->$err_array, "Your Email don't match");
            	return;
            }
            if(!filter_var($em,FILTER_VALIDATE_EMAIL)){
            	array_push($this->$err_array, "Your Email is invalid");
            	return;
            }
	   }
	   private function validatePassword($pw,$pw2){
	   	    if($pw != $pw2){
            	array_push($this->$err_array, "Your Password don't match");
            	return;
            }
            if(preg_match('/[^A-Za-z0-9]/', $pw)){
            	rray_push($this->$err_array, "Your Password can only contains letters and numbers");
            	return;
            }
             if(strlen($pw) > 30 || strlen($pw) < 5){
                array_push($this->$err_array, "Your Password must be between 5 and 30 character");
                return;
       	    }
	   }
    }



 ?>