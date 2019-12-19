<?php 
require_once '../init.php';
require_once '../class/Order.php';

if(!isset($_SESSION['login'])){
   header('Location: ../login.php');
   exit;
}

$page_title = 'Dashboard';
$order = new Order();
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
		<div class="d-sm-flex align-items-center justify-content-between mb-4">
			<h1 class="h3 mb-0 text-gray-800">Main Stuff</h1>
		</div>

		<div class="row">

		<!-- Earnings (Monthly) Card Example -->
		<div class="col-xl-3 col-md-6 mb-4">
		  <div class="card border-left-primary shadow h-100 py-2">
			<div class="card-body">
			  <div class="row no-gutters align-items-center">
				<div class="col mr-2">
				  <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Orders</div>
				  <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $order -> allOrdersCount($_SESSION['user_id']); ?></div>
				</div>
				<div class="col-auto">
				  <i class="fas fa-calendar fa-2x text-gray-300"></i>
				</div>
			  </div>
			</div>
		  </div>
		</div>

		<!-- Earnings (Monthly) Card Example -->
		<div class="col-xl-3 col-md-6 mb-4">
		  <div class="card border-left-success shadow h-100 py-2">
			<div class="card-body">
			  <div class="row no-gutters align-items-center">
				<div class="col mr-2">
				  <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Last Orders (Date)</div>
				  <div class="h5 mb-0 font-weight-bold text-gray-800">[date]</div>
				</div>
				<div class="col-auto">
				  <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
				</div>
			  </div>
			</div>
		  </div>
		</div>

		<!-- Earnings (Monthly) Card Example -->
		<div class="col-xl-3 col-md-6 mb-4">
		  <div class="card border-left-info shadow h-100 py-2">
			<div class="card-body">
			  <div class="row no-gutters align-items-center">
				<div class="col mr-2">
				  <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Lorem Ipsum</div>
				  <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
				</div>
				<div class="col-auto">
				  <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
				</div>
			  </div>
			</div>
		  </div>
		</div>

		<!-- Pending Requests Card Example -->
		<div class="col-xl-3 col-md-6 mb-4">
		  <div class="card border-left-warning shadow h-100 py-2">
			<div class="card-body">
			  <div class="row no-gutters align-items-center">
				<div class="col mr-2">
				  <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">User Name</div>
				  <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $_SESSION['first_name']; ?></div>
				</div>
				<div class="col-auto">
				  <i class="fas fa-comments fa-2x text-gray-300"></i>
				</div>
			  </div>
			</div>
		  </div>
		</div>
	  </div>

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
