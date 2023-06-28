<?php
function get_user_by_email($email) {
	$pdo = new PDO("mysql:host=localhost;dbname=in_deep_project", "root", "");
	$sql = "SELECT * FROM users WHERE email=:email";
	$statement = $pdo->prepare($sql);
	$statement->execute(["email" => $email]);
	return $statement->fetch(PDO::FETCH_ASSOC);
}

function get_user_by_id($id) {
	$pdo = new PDO("mysql:host=localhost;dbname=in_deep_project", "root", "");
	$sql = "SELECT * FROM users WHERE id=:id";
	$statement = $pdo->prepare($sql);
	$statement->execute(["id" => $id]);
	return $statement->fetch(PDO::FETCH_ASSOC);
}

function set_flash_message($name, $message) {
	$_SESSION['name'] = $name;
	$_SESSION['message'] = $message;
}

function redirect_to($path) {
	header("Location: $path");
}

function add_user($email, $password) {
	$pdo = new PDO("mysql:host=localhost;dbname=in_deep_project", "root", "");
	//$sql = "INSERT INTO users (email, password) VALUES (:email, :password)";
	$sql = "INSERT INTO users (email, password, name, job_title, status, image, phone, address, vk, telegram, instagram, role) VALUES (:email, :password, :name, :job_title, :status, :image, :phone, :address, :vk, :telegram, :instagram, :role)";
	$statement = $pdo->prepare($sql);
	$statement->execute([
		"email" => $email,
		"password" => password_hash($password, PASSWORD_DEFAULT),
		"name" => "",
		"job_title" => "",
		"status" => "success",
		"image" => "",
		"phone" => "",
		"address" => "",
		"vk" => "",
		"telegram" => "",
		"instagram" => "",
		"role" => "user"
	]);
}

function display_flash_message ($name, $message) {	
    echo "<div class=\"alert alert-{$name} text-dark\" role=\"alert\">{$message} </div>";
}

function login($email, $password) {
	$pdo = new PDO("mysql:host=localhost;dbname=in_deep_project;", "root", "");
	$sql = "SELECT * FROM users WHERE email=:email";
	$statement = $pdo->prepare($sql);
	$statement->execute(['email' => $email]);
	$user = $statement->fetch(PDO::FETCH_ASSOC);

	if(empty($user)) {	    
	    return false;	    
	    exit;
	};

	if(!password_verify($password, $user['password'])) {	    
	    return false;	    
	    exit;
	};

	$_SESSION['logged_in_user'] = $user;	
	return true;
}

function is_not_logged_in() {
	if(!isset($_SESSION['logged_in_user'])) {
		return true;
	}
}

function get_users() {
	$pdo = new PDO("mysql:host=localhost;dbname=in_deep_project;", "root", "");
	$sql = "SELECT * FROM users";
	$statement = $pdo->prepare($sql);
	$statement->execute();
	return $statement->fetchAll(PDO::FETCH_ASSOC);

}

function is_admin($user) {
	if($user['role'] == "admin") {
		return true;
	}
}

function get_logged_in_user() {
	return $_SESSION['logged_in_user'];
}

function is_equal_user($user, $current_user) {
	$current_user = $_SESSION['logged_in_user'];
	return $user['id'] === $current_user['id'];
}

function create_user($name, $job_title, $phone, $address, $email, $password, $status, $filename, $tmp_name, $vk, $telegram, $instagram, $role) {
	$picture = pathinfo($filename);
	$imagename = uniqid() . "." . $picture['extension'];
	move_uploaded_file($tmp_name, 'img/demo/avatars/' . $imagename);

	$pdo = new PDO("mysql:host=localhost;dbname=in_deep_project", "root", "");
	$sql = "INSERT INTO users (email, password, name, job_title, status, image, phone, address, vk, telegram, instagram, role) VALUES (:email, :password, :name, :job_title, :status, :image, :phone, :address, :vk, :telegram, :instagram, :role)";
	$statement = $pdo->prepare($sql);
	$statement->execute([
		"email" => $email,
		"password" => password_hash($password, PASSWORD_DEFAULT),
		"name" => $name,
		"job_title" => $job_title,
		"status" => $status,
		"image" => $imagename,
		"phone" => $phone,
		"address" => $address,
		"vk" => $vk,
		"telegram" => $telegram,
		"instagram" => $instagram,
		"role" => $role
	]);
}

function edit_store($id, $name, $job_title, $phone, $address) {	
	$pdo = new PDO("mysql:host=localhost;dbname=in_deep_project", "root", "");
	$sql = "UPDATE users SET name=:name , job_title=:job_title , phone=:phone , address=:address WHERE id=:id";
	$statement = $pdo->prepare($sql);
	$statement->execute(['id' => $id, 'name' => $name, 'job_title' => $job_title, 'phone' => $phone, 'address' => $address]);	
}

function security_store($id, $email, $password) {
	$pdo = new PDO("mysql:host=localhost;dbname=in_deep_project", "root", "");
	$sql = "UPDATE users SET email=:email , password=:password WHERE id=:id";
	$statement = $pdo->prepare($sql);
	$statement->execute([
	"id" => $id, 
	"email" => $email,
	"password" => password_hash($password, PASSWORD_DEFAULT)
	]);
}

function status_store($id, $status) {
	$pdo = new PDO("mysql:host=localhost;dbname=in_deep_project", "root", "");
	$sql = "UPDATE users SET status=:status WHERE id=:id";
	$statement = $pdo->prepare($sql);
	$statement->execute([
	'id' => $id, 
	"status" => $status
	]);
}

function media_store($id, $old_image, $filename, $tmp_name) {
	unlink("img/demo/avatars/".$old_image);
	$picture = pathinfo($filename);
	$imagename = uniqid() . "." . $picture['extension'];
	move_uploaded_file($tmp_name, 'img/demo/avatars/' . $imagename);
	$pdo = new PDO("mysql:host=localhost;dbname=in_deep_project", "root", "");
	$sql = "UPDATE users SET image=:image WHERE id=:id";
	$statement = $pdo->prepare($sql);
	$statement->execute([
	'id' => $id, 
	'image' => $imagename
	]);
}

function delete_user($user) {
	unlink("img/demo/avatars/".$user['image']);
	$pdo = new PDO("mysql:host=localhost;dbname=in_deep_project", "root", "");
	$sql = "DELETE FROM users WHERE id=:id";
	$statement = $pdo->prepare($sql);
	$statement->execute(['id' => $user['id']]);
}

function logout() {
	unset($_SESSION['logged_in_user']);
}

?>