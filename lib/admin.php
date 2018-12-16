<?php
function allReservations(){
$pdo = Connect::getInstance();
$query = "SELECT * FROM reservations JOIN vehicles
ON reservations.vehicle_id = vehicles.vehicle_id ORDER BY date_start ASC";
$res = $pdo->query($query);
$res = $res->fetchAll(PDO::FETCH_OBJ);
return $res;
}

function insertReservation($vehicleId, $dateStart, $dateEnd, $firstName, $lastName, $email, $phone){
$pdo = Connect::getInstance();
$query = "INSERT INTO reservations (vehicle_id, date_start, date_end, first_name, last_name, email, phone) VALUES (:vehicle_id, :date_start, :date_end, :first_name, :last_name, :email, :phone)";

$res = $pdo->prepare($query);
$res->bindParam(":vehicle_id", $vehicleId);
$res->bindParam(":date_start", $dateStart);
$res->bindParam(":date_end", $dateEnd);
$res->bindParam(":first_name", $firstName);
$res->bindParam(":last_name", $lastName);
$res->bindParam(":email", $email);
$res->bindParam(":phone", $phone);

if($res->execute())
return true;
else
return false;
}

function login($userName, $password){
$pdo = Connect::getInstance();
$password = md5($password);
$query = "SELECT * FROM users WHERE user_name = '{$userName}' AND password = '{$password}'";
$res = $pdo->query($query);
if($res->rowCount() == 1){
$user = $res->fetch(PDO::FETCH_OBJ);
$_SESSION['user_id'] = $user->user_id;
$_SESSION['userName'] = $user->user_name;
return true;
}else
return false;
}

function reservation($id){
$pdo = Connect::getInstance();
$query = "SELECT * FROM reservations WHERE reservation_id = $id";
$res = $pdo->query($query);
$res = $res->fetch(PDO::FETCH_OBJ);
return $res;
}

function updateReservation($vehicleId, $dateStart, $dateEnd, $firstName, $lastName, $email, $phone, $reservation_id){
$pdo = Connect::getInstance();
echo $query = "UPDATE reservations SET vehicle_id = :vehicle_id, date_start = :date_start, date_end = :date_end, first_name = :first_name, last_name = :last_name, email = :email, phone = :phone
WHERE reservation_id = :reservation_id";

$res = $pdo->prepare($query);
$res->bindParam(":vehicle_id", $vehicleId);
$res->bindParam(":date_start", $dateStart);
$res->bindParam(":date_end", $dateEnd);
$res->bindParam(":first_name", $firstName);
$res->bindParam(":last_name", $lastName);
$res->bindParam(":email", $email);
$res->bindParam(":phone", $phone);
$res->bindParam(":reservation_id", $reservation_id);

if($res->execute())
return true;
else
return false;
}

function deleteReservation($reservationId){
$pdo = Connect::getInstance();
$query = "DELETE FROM reservations WHERE reservation_id = $reservationId";

if($pdo->query($query))
return true;
else
return false;
}

function updateUserName($userId, $userName){
$pdo = Connect::getInstance();
$query = "UPDATE users SET user_name = :user_name
WHERE user_id = :user_id";
$res = $pdo->prepare($query);
$res->bindParam(":user_name", $userName);
$res->bindParam(":user_id", $userId);

if($res->execute())
return true;
else
return false;
}

function updatePassword($userId, $password){
$pdo = Connect::getInstance();
$query = "UPDATE users SET password = :password
WHERE user_id = :user_id";
$res = $pdo->prepare($query);
$res->bindParam(":password", $password);
$res->bindParam(":user_id", $userId);

if($res->execute())
return true;
else
return false;
}
