<?php
	class Account {
		private $con;
		private $errorArray;
		private $conn;

		public function __construct($con) {
			$this->con = $con;
			$this->errorArray = array();
			$this->conn = $conn;

		}


		public function adminLogin($un, $pw){
			$checkAdmin = mysqli_query($this->con,"SELECT * FROM admin WHERE adminname='$un' AND adminpassword = '$pw'");
			if(mysqli_num_rows($checkAdmin) == 1){
				return true;
			}else{
				array_push($this->errorArray, Constants::$adminFailed);
				return false;
			}
		}

		public function login($un,$pw){
			$checkLogin = mysqli_query($this->con,"SELECT * FROM users WHERE username='$un' AND password = '$pw'");
			if(mysqli_num_rows($checkLogin) == 1){
				return true;
			}else{
				array_push($this->errorArray, Constants::$loginFailed);
				return false;
			}
		}

		public function register($un, $fn, $ln, $em, $em2, $pw, $pw2) {
			$this->validateUsername($un);
			$this->validateFirstName($fn);
			$this->validateLastName($ln);
			$this->validateEmails($em, $em2);
			$this->validatePasswords($pw, $pw2);

			if(empty($this->errorArray) == true) {
				
				return $this->insertUser($un, $fn, $ln, $em, $pw);
			}
			else {
				return false;
			}

		}

	

		public function updateProperty($id, $tl, $ty, $des, $pri, $add, $img, $co, $name){
			$res = mysqli_query($this->con, "UPDATE Properties SET title='$tl', type='$ty', description='$des', Price='$pri', address='$add', pimage='$img', contact='$co', name='$name' WHERE id='$id'");
			return $res;
		}

		public function listing($tl, $ty, $des, $pri, $add, $img, $co, $name, $status){
			$res = mysqli_query($this->con, "INSERT INTO Properties VALUES(null, '$tl','$ty','$des','$pri','$add','$img','$co','$name','$status')");
			return $res;
				
		}

		


		public function getError($error) {
			if(!in_array($error, $this->errorArray)) {
				$error = "";
			}
			return "<span class='errorMessage'>$error</span>";
		}

		private function insertUser($un, $fn, $ln, $em, $pw){
			
			$result = mysqli_query($this->con, "INSERT INTO users VALUES(null, '$un','$fn','$ln','$em','$pw')");
			return $result;
		}

		private function validateUsername($un) {

			if(strlen($un) > 25 || strlen($un) < 5) {
				array_push($this->errorArray, Constants::$usernameCharacters);
				return;
			}

			$checkUsername = mysqli_query($this->con,"SELECT username FROM users WHERE username = '$un'");
			if(mysqli_num_rows($checkUsername) != 0){
				array_push($this->errorArray,Constants::$usernameTaken);
				return;
			}

		}

		private function validateFirstName($fn) {
			if(strlen($fn) > 25 || strlen($fn) < 2) {
				array_push($this->errorArray, Constants::$firstNameCharacters);
				return;
			}
		}

		private function validateLastName($ln) {
			if(strlen($ln) > 25 || strlen($ln) < 2) {
				array_push($this->errorArray, Constants::$lastNameCharacters);
				return;
			}
		}

		private function validateEmails($em, $em2) {
			if($em != $em2) {
				array_push($this->errorArray, Constants::$emailsDoNotMatch);
				return;
			}
			$checkEmail = mysqli_query($this->con, "SELECT email FROM users WHERE email = '$em'");
			if(mysqli_num_rows($checkEmail) != 0){
				array_push($this->errorArray,Constants::$emailTaken);
				return;
			}


			

		}

		private function validatePasswords($pw, $pw2) {
			
			if($pw != $pw2) {
				array_push($this->errorArray, Constants::$passwordsDoNoMatch);
				return;
			}

			

			if(strlen($pw) > 30 || strlen($pw) < 5) {
				array_push($this->errorArray, Constants::$passwordCharacters);
				return;
			}

		}


	}
?>