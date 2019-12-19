<?php 
require_once 'Database.php';

class User {

   private $conn;
   private $table = 'users';
   
   public $validation;
   public $id;
   public $first_name;
   public $last_name;
   public $email;
   public $created;

   public function __construct(){
      $this->conn = new Database(); 
      $this->validation = new Validation();
   }

   public function emailExist(){
      $this->email = $this->validation->checkEmail($_POST['email']);
      $query = "SELECT * FROM " . $this->table . " WHERE email = :email";
      $this->conn->query($query);
      $this->conn->bind('email', $this->email);
      $this->conn->execute();
      return $this->conn->rowCount();
   }

   public function passwordMatches(){
      $password = $_POST['password'];
      $password2 = $_POST['password2'];

      if($password === $password2){
         return true;
      }
   }

   public function checkAccount(){
      if($this->emailExist() > 0){
         $data = $this->conn->result();
         $password_verify = password_verify($_POST['password'], $data['password']);
         if($_POST['password'] == $password_verify){
            $this->id = $data['id'];
            $this->first_name = $data['first_name'];
            $this->last_name = $data['last_name'];			
            $this->email = $data['email'];
            return true;
         }else{
            return false;
         }
      }else{
         return false;
      }
   }

   public function createAccount(){
      $this->first_name = $this->validation->checkName($_POST['first_name']);
      $this->last_name = $this->validation->checkName($_POST['last_name']);
      $this->email = $this->validation->checkEmail($_POST['email']);
      $password = $_POST['password'];
      $password_hash = password_hash($_POST['password'], PASSWORD_BCRYPT);
      $this->created = date('Y-m-d H:i:s');

      if(($this->first_name && $this->last_name && $this->email) == 0){
         return 0;
      }else{ 
         $query = "INSERT INTO users (id, first_name, last_name, email, password, created) VALUES ('', :first_name, :last_name, :email, :password, :created)";
         $this->conn->query($query);
         $this->conn->bind('first_name', $this->first_name);
         $this->conn->bind('last_name', $this->last_name);
         $this->conn->bind('email', $this->email);
         $this->conn->bind('password', $password_hash);
         $this->conn->bind('created', $this->created);
         $this->conn->execute();
         return $this->conn->rowCount();
      }
   }

   public function getAccount(){
      $query = "SELECT * FROM users";
      $this->conn->query($query);
      return $this->conn->resultAll();
   }
}