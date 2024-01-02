<?php

function generateRandomString($length = 4) {
    $characters = '0123456789';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}



class Form{
 
    // database connection and table name
    private $conn;
    private $table_name = "register";
 
    // object properties
    public $id;
    public $name;
    public $description;
    public $price;
    public $category_id;
    public $category_name;
    public $created;
 
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }
function createaccount(){
 $query = "INSERT INTO `register`
            SET
                username='".$this->username."', emailid='".$this->emailid."', gender='".$this->gender."',password='".$this->password."',status='1',token='".$this->token."'";

    // prepare query
$stmt = $this->conn->prepare($query);  

    if($stmt->execute()){
    
    return true;
    }
 
    return false;
}

}
