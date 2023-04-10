<?php
if(isset($_POST['loginButton'])) { 
	$loginUsername = $_POST['loginUsername'];
	$loginPassword = $_POST['loginPassword'];

	$isReal = $account->login($loginUsername ,$loginPassword);
	
	if($isReal == true){
		$_SESSION['userLoggedIn'] = $loginUsername;
		header("Location: index.php");
	}


}

/*if(isset($_POST['adminButton'])) { 
	$adminUsername = $_POST['adminUsername'];
	$adminPassword = $_POST['adminPassword'];

	$isAdmin = $account->adminLogin($adminUsername ,$adminPassword);
	
	if($isAdmin == true){
		header("Location: admin.php");
	}


}*/
?>

	