<?php 
require_once 'Database.php';

class Order {

   private $conn;
   private $table = 'orders';
   
   public $validation;
   public $title;
   public $description;
   public $created;

   public function __construct(){
      $this->conn = new Database(); 
      $this->validation = new Validation();
   }

   public function orderTitleExist(){
      $this->title = $_POST['title'];
      $query = "SELECT * FROM " . $this->table . " WHERE title = :title";
      $this->conn->query($query);
      $this->conn->bind('title', $this->title);
      $this->conn->execute();
      return $this->conn->rowCount();
   }


   public function createOrder(){
      $this->title = $_POST['title'];
      $this->description = $_POST['description'];
      $this->created = date('Y-m-d H:i:s');

      if(($this->title && $this->description) == 0){
         return 0;
      }else{ 
         $query = "INSERT INTO orders (id, title, description, user_id, created) VALUES ('', :title, :description, :user_id, :created)";
         $this->conn->query($query);
         $this->conn->bind('title', $this->title);
         $this->conn->bind('description', $this->description);
         $this->conn->bind('user_id', $_SESSION['user_id']);
         $this->conn->bind('created', $this->created);
         $this->conn->execute();
         return $this->conn->rowCount();
      }
   }

   public function updateOrder(){
      $this->title = $_POST['title'];
      $this->description = $_POST['description'];
      $this->created = date('Y-m-d H:i:s');
      $user_id = $_POST['id'];
      if(($this->title && $this->description) == 0){
         return 0;
         exit;
      }else{ 
         $query = "UPDATE orders SET title=:title, description=:description WHERE id=:id";
         $this->conn->query($query);
         $this->conn->bind('title', $this->title);
         $this->conn->bind('description', $this->description);
         $this->conn->bind('id', $user_id);
         $this->conn->execute();
         return $this->conn->rowCount();
      }
   }   
   public function deleteOrder($id){
      $query = "DELETE FROM orders WHERE id = :id";
      $this->conn->query($query);
      $this->conn->bind('id', $id);
      $this->conn->execute();
      return $this->conn->rowCount();
   }
   public function getOrders(){
      $query = "SELECT * FROM orders";
      $this->conn->query($query);
      return $this->conn->resultAll();
   }

   public function getSpecificOrder($id){
      $query = "SELECT * FROM orders WHERE id = $id";
      $this->conn->query($query);
      return $this->conn->result();
   } 
   
   public function allOrdersCount($id){
      $query = "SELECT * FROM orders WHERE id = $id";
      $this->conn->query($query);
      return $this->conn->rowCount();
   }  
}