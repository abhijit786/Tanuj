<?php
// include database and object files
include_once '../config/database.php';
include_once '../objects/user.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare user object
$user = new User($db);
// set ID property of user to be edited
$user->username = isset($_GET['username']) ? $_GET['username'] : die();
$user->password = isset($_GET['password']) ? md5($_GET['password']) : die();
$user->role = isset($_GET['role']) ? $_GET['role'] : die();


// read the details of user to be edited
$stmt = $user->login();
//notice the 'fetch' in place of 'fetchAll'
$dataconn= $stmt->fetchAll(PDO::FETCH_ASSOC);
$rows=0;

foreach ($dataconn as $row){
$rows++;
}


        if($rows > 0){
    // get retrieved row
	

    // create array
    $user_arr=array(
        "status" => true,
        "message" => "Successfully Login!",
        "id" => $row['user_id'],
        "username" => $row['username'],
		"role" => $row['role']
    );
	
	session_start();
	$_SESSION["username"]=$row['username'];
	$_SESSION["role"]=$row['role'];
	print_r(json_encode($user_arr));
}
else{

    $user_arr=array(
        "status" => false,
        "message" => "Invalid Username or Password!",
    );
	print_r(json_encode($user_arr));
}
// make it json format

?>