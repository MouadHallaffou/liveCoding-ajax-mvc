<?php

require_once 'database.php';

class User extends Database{

    public function __construct()
    {
        parent::__construct();
    }

    public function insert($fname , $lname, $email, $phone){
        $sql = "INSERT INTO users (fname, lname,email,phone) VALUES (:fname, :lname, :email, :phone)";
        $stmt = $this->conn->prepare($sql);
        $stmt -> execute(['fname'=>$fname, 'lname'=>$lname, 'email'=>$email, 'phone'=>$phone]);
        return true;
    }

    public function read(){
        $query = "SELECT * FROM users";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getUserById($id){
        $sql = "SELECT * from users WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id'=>$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id, $fname, $lname, $email, $phone) {
        $sql = "UPDATE users SET fName = :fname, lName = :lname, email = :email, phone = :phone WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":fname", $fname, PDO::PARAM_STR);
        $stmt->bindParam(":lname", $lname, PDO::PARAM_STR);
        $stmt->bindParam(":email", $email, PDO::PARAM_STR);
        $stmt->bindParam(":phone", $phone, PDO::PARAM_STR);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);

        return $stmt->execute();
    }
    
    
    public function delete($id){
        $sql = "DELETE from users where id = :id";
        $stmt=$this->conn->prepare($sql);
        $stmt->execute(['id'=>$id]);
        return true;
    }


    public function totalRowCount(){
        $sql = "select * from users";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->rowCount();
    }

}