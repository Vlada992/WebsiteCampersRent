<?php
function allVehicles(){
$pdo = Connect::getInstance();
$query = "select * from vehicles";
$res = $pdo->query($query);
$res = $res->fetchAll(PDO::FETCH_OBJ);
return $res;
}

function vehiclePeriods($id){
$pdo = Connect::getInstance();

$query = "SELECT * FROM reservations JOIN vehicles
ON reservations.vehicle_id = vehicles.vehicle_id 
WHERE reservations.vehicle_id = $id ORDER BY date_start ASC";
$res = $pdo->query($query);
$res = $res->fetchAll(PDO::FETCH_OBJ);
return $res;
}

function checkDateStart($date, $vehicleId){
$pdo = Connect::getInstance();
$query = "SELECT * FROM reservations 
WHERE vehicle_id = $vehicleId AND '{$date}' between date_start AND date_end";
$res = $pdo->query($query);

if($res->rowCount() > 0)
return true;
else
return false;
}
