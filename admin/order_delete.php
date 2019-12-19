<?php
$page_title = 'Delete Order';
require_once '../class/Order.php';
require_once '../init.php';

$order = new Order();

if(isset($_POST['delete'])){
   if($order->deleteOrder($_GET['id']) > 0){
      Flasher::setFlash('Successfully deleted order', '', 'success');
         header('Location: order.php');
      }else{
         Flasher::setFlash('Failed to delete this order', '', 'danger');
         header('Location: order.php');
   }
}

?>
<?php include("inc_parts/header.php");?>

</head>
<body>
<?php if(isset($_GET['id'])) : ?>
<div class="container">
   <h2 class="mt-5">Delete Order</h2>
   <hr>
   
   <div class="alert alert-danger" role="alert">
      Are you sure?
   </div>
   
   <form action="" method="post">
      <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
      <button name="delete" type="submit" class="btn btn-danger">Yes</button>
      <a href="order.php" class="btn btn-secondary">No</a>
   </form>
</div>
<?php endif; ?>
</body>