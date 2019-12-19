<?php 
require_once '../init.php';
require_once '../class/Order.php';
if(!isset($_SESSION['login'])){
   header('Location: ../login.php');
   exit;
}

$page_title = 'Orders List';
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
          <h1 class="h3 mb-4 text-gray-800">Orders List</h1>
				  <div><?php Flasher::flash(); ?></div>
            <table class="table table-bordered">
            <thead class="thead-light">
              <tr>
                <th scope="col">#ID</th>
                <th scope="col">Order</th>
                <th scope="col">Description</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
            <?php foreach($order -> getOrders() as $order){ ?>
              <tr>
                <td><?php echo $order['id'] ?></td>
                <td><?php echo $order['title'] ?></td>
                <td><?php echo $order['description'] ?></td>
                <td>
                  <a href="order_update.php?id=<?php echo $order['id']; ?>" class="btn btn-primary btn-sm">Update</a>
                  <a class="btn btn-outline-danger btn-sm" href="order_delete.php?id=<?php echo $order['id']; ?>">Delete</a>
                </td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
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