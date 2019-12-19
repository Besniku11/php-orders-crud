<?php 
$page_title = 'Login';
require_once 'init.php';

if(isset($_SESSION['login'])){
   header('Location: admin/index.php');
}

$user = new User();

if(isset($_POST['login'])){
   if($user->checkAccount() == true){	
      $_SESSION['login'] = true;
      $_SESSION['first_name'] = $user->first_name;
      $_SESSION['user_id'] = $user->id;
      $_SESSION['last_name'] = $user->last_name;
      $_SESSION['email'] = $user->email;
      header('Location: admin/index.php');
   }else{
      Flasher::setFlash('Wrong email or password!',' <br/>please try again.','danger');
  }}
?>

<!DOCTYPE html>
<html lang="en">

<head>

<?php include("inc_parts/header.php");?>

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5" style="max-width: 600px; margin: auto;">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
			<div class="p-5">
			  <div class="text-center">
				<h1 class="h4 text-gray-900 mb-4">Login Form</h1>
			  </div>
			  <div><?php Flasher::flash(); ?></div>
			  <form method="post">
				<div class="form-group">
				  <input type="email" class="form-control form-control-user" aria-describedby="emailHelp" placeholder="Enter Email Address..." name="email" required>
				</div>
				<div class="form-group">
				  <input type="password" class="form-control form-control-user" placeholder="Password" name="password" required>
				</div>
				<button type="submit" name="login" class="btn btn-primary btn-user btn-block">
				  Login
				</button>
			  </form>
			  <hr>
			  <div class="text-center">
				<a class="small" href="register.php">Create an Account!</a>
			  </div>
			</div>
          </div>
        </div>

      </div>

    </div>

  </div>

<?php include("inc_parts/footer.php");?>