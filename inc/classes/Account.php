<?php
    /**
     * 
     */
    class Account 
    {
    	
    	public function __construct()
    	{
    		# code...
    	}
    	public function register($un,$fn,$ln,$em,$em2,$pw,$pw2){
    		$this->validateUsername($un);
    		$this->validateFirstname($fn);
    		$this->validateLastName($ln);
    		$this->validateEmails($em,$em2);
    		$this->validatePassword($pw,$pw2);
    	}
       private function validateUsername($un){
       	  echo "ghghhggh";

	   }
	   private function validateFirstname($fn){

	   }
	   private function validateLastName($ln){

	   }
	   private function validateEmails($em,$em2){

	   }
	   private function validatePassword($pw,$pw2){
	   	
	   }
    }



 ?>