<?php
    /**
     * 
     */
    class Account 
    {
        private $con;
    	private $err_array;
    	public function __construct($con)
    	{
            $this->con = $con;
    		$this->err_array = array();
    	}
    	public function register($un,$fn,$ln,$em,$em2,$pw,$pw2){
    		$this->validateUsername($un);
    		$this->validateFirstname($fn);
    		$this->validateLastName($ln);
    		$this->validateEmails($em,$em2);
    		$this->validatePassword($pw,$pw2);

    		if(empty($this->err_array)){
    			return $this->insertUserDetails($un,$fn,$ln,$em,$pw);
    		}else{
    			return false;
    		}
    	}
    	public function getError($error){
    		if(!in_array($error, $this->err_array)){
    			$error = "";
    		}
    		return "<span class='errorMessage'>$error</span>";
    	}

       private function insertUserDetails($un,$fn,$ln,$em,$pw){
            $encryptedPw = md5($pw);
            $profilePic = "assets/images/profile/demo_head.jpg";
            $date = date('Y-m-d');

            $result = mysqli_query($this->con,"INSERT INTO users VALUES('','$un','$fn','$ln','$em','$encryptedPw','$date','$profilePic')");

            return $result;
     
       }

       private function validateUsername($un){
       	  if(strlen($un) > 25 || strlen($un) < 5){
                array_push($this->err_array, Constants::$usernameCharacters);
                return;
       	  }

	   }
	   private function validateFirstname($fn){
           if(strlen($fn) > 25 || strlen($fn) < 2){
                array_push($this->err_array, Constants::$firstNameCharacters);
                return;
       	   }
	   }
	   private function validateLastName($ln){
            if(strlen($ln) > 25 || strlen($ln) < 2){
                array_push($this->err_array, Constants::$lastNameCharacters);
                return;
       	     }
	   }
	   private function validateEmails($em,$em2){
            if($em != $em2){
            	array_push($this->err_array, Constants::$emailsDoNotMatch);
            	return;
            }
            if(!filter_var($em,FILTER_VALIDATE_EMAIL)){
            	array_push($this->err_array, Constants::$emailInvalid);
            	return;
            }
	   }
	   private function validatePassword($pw,$pw2){
	   	    if($pw != $pw2){
            	array_push($this->err_array, Constants::$passwordsDoNoMatch);
            	return;
            }
            if(preg_match('/[^A-Za-z0-9]/', $pw)){
            	rray_push($this->err_array, Constants::$passwordNotAlphanumeric);
            	return;
            }
             if(strlen($pw) > 30 || strlen($pw) < 5){
                array_push($this->err_array, Constants::$passwordCharacters);
                return;
       	    }
	   }
    }



 ?>