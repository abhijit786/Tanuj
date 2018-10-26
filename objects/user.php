<?php
class User{
 
    // database connection and table name
    private $conn;
    private $table_name = "user_login";
 
    // object properties
    public $id;
    public $username;
    public $password;
    public $created;
	public $role;
 
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }
    // signup user
    function signup(){
		
        if($this->isAlreadyExist()){
            return false;
        }
        // query to insert record
		
        $query = "INSERT INTO  ". $this->table_name ." (username,password,created) VALUES ('".$this->username."','".$this->password."','".$this->created."')";
	
			  
		
		
    
        // prepare query
        $stmt = $this->conn->prepare($query);
		
      
    
        // execute query
        if($stmt->execute()){
          
            return true;
        }
    
        return false;
        
    }
    // login user
    function login(){
		
        // select all query
        $query = "SELECT
                    `user_id`, `username`, `password`, `created`,`role`
                FROM
                    " . $this->table_name . " 
                WHERE
                    username='".$this->username."' AND password='".$this->password."' AND role='".$this->role."'";
					
					
        // prepare query statement
        $stmt = $this->conn->prepare($query);
        // execute query
		   $stmt->execute();
        return $stmt;
	
    }
	
	
	
    function isAlreadyExist(){
		
        $query = "SELECT *
            FROM
                " . $this->table_name . " 
            WHERE
                username='".$this->username."'";
				
				
        // prepare query statement
        $stmt = $this->conn->prepare($query);
        // execute query
        $stmt->execute();
		
		
		
        if(count($stmt->fetchAll()) > 0){
            return true;
			
        }
        else{
            return false;
        }
    }
}
?>