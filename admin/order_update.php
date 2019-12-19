<?php 
require_once '../init.php';
require_once '../class/Order.php';
if(!isset($_SESSION['login'])){
   header('Location: ../login.php');
   exit;
}
$user_id = $_GET['id'];
$page_title = 'Update Order';
$order = new Order();

if(isset($_POST['update'])){
      if($order->updateOrder() > 0){
         Flasher::setFlash('Order Successfully Updated','','success');
         header('Location: order.php');
         exit;
      }else{
         Flasher::setFlash('Operation Failed','','danger');
      }
}
?>




<?php include("inc_parts/header.php");?>

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <?php include("inc_parts/sidebar.php");?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

      <?php include("inc_parts/navbar.php");?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Order Update</h1>
		<div><?php Flasher::flash(); ?></div>

    <?php 
      // var_dump($order -> getSpecificOrder($user_id));
      $row = $order -> getSpecificOrder($user_id);
    ?>
		<form method="post">
		  <div class="form-group">
			<label for="title">Title</label>
			<input type="text" class="form-control" id="text" name="title" value="<?php echo $row['title']; ?>" required>
      <input type="hidden" name="id" value="<?php echo $user_id; ?>">
		  </div>
		  <div class="form-group">
			<label for="desc">Description</label>
			<textarea type="password" class="form-control" id="desc" name="description" required><?php echo $row['description']; ?></textarea>
		  </div>
		  <button type="submit" class="btn btn-primary" name="update">Submit</button>
		</form>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

<?php include("inc_parts/footer.php");?>