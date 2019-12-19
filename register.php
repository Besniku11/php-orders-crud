<?php 
$page_title = 'Registation';
require_once 'init.php';
$user = new User();

if(isset($_POST['register'])){
   if($user->emailExist() > 0){
      Flasher::setFlash('Email already exist!',' try again','danger');
   }else if($user->passwordMatches() != true){
      Flasher::setFlash('Password not matches!',' try again','danger');
   }else{
      if($user->createAccount() > 0){
         Flasher::setFlash('Successfully Registered',' please login.','success');
         header('Location: login.php');
         exit;
      }else{
         Flasher::setFlash('Failed Registered',' try again','danger');
      }
   }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

<?php include("inc_parts/header.php");?>

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5" style="max-width: 600px; margin: auto;">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
		<div class="p-5">
		  <div class="text-center">
			<h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
		  </div>
		  <?php Flasher::flash(); ?>
		  <form action="" method="post">
			<div class="form-group row">
			  <div class="col-sm-6 mb-3 mb-sm-0">
				<input type="text" class="form-control form-control-user" id="exampleFirstName" placeholder="First Name" name="first_name" required>
			  </div>
			  <div class="col-sm-6">
				<input type="text" class="form-control form-control-user" id="exampleLastName" placeholder="Last Name" name="last_name" required>
			  </div>
			</div>
			<div class="form-group">
			  <input type="email" class="form-control form-control-user" id="exampleInputEmail" placeholder="Email Address" name="email" required>
			</div>
			<div class="form-group row">
			  <div class="col-sm-6 mb-3 mb-sm-0">
				<input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password" name="password" required>
			  </div>
			  <div class="col-sm-6">
				<input type="password" class="form-control form-control-user" id="exampleRepeatPassword" placeholder="Repeat Password" name="password2" required>
			  </div>
			</div>
			<button class="btn btn-primary btn-user btn-block" type="submit" name="register">Register Account</button>
		  </form>
		  <hr>
		  <div class="text-center">
			<a class="small" href="login.php">Already have an account? Login!</a>
		  </div>
		</div>
      </div>
    </div>

  </div>

<?php include("inc_parts/footer.php");?>