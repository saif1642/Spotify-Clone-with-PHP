<?php

   function sanitizeFormUsername($inputText)
   {
		$inputText = strip_tags($inputText);
		$inputText = str_replace(" ","",$inputText);
		return $inputText;
   }
   function sanitizeFormString($inputText)
   {
		$inputText = strip_tags($inputText);
		$inputText = str_replace(" ","",$inputText);
		$inputText = ucfirst(strtolower($inputText));
		return $inputText;
   }
   function sanitizeFormPassword($inputText)
   {
		$inputText = strip_tags($inputText);
		return $inputText;
   }

	if(isset($_POST['registerButton'])){
		//Register button pressed
		$username = sanitizeFormUsername($_POST['username']);
		$firstname = sanitizeFormString($_POST['firstName']);
		$lastname = sanitizeFormString($_POST['lastName']);
		$email = sanitizeFormString($_POST['email']);
		$c_email = sanitizeFormString($_POST['c_email']);
		$password = sanitizeFormPassword($_POST['password']);
		$c_password = sanitizeFormPassword($_POST['c_password']);

		$account->register($username,$firstname,$lastname,$email,$c_email,$password,$c_password);

	}

?>