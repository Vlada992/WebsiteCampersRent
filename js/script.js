function busyPeriods(vehicle){
var vehicleId = vehicle.value;
$.ajax({
type: "POST",
url: "busyPeriods.php",
data: "id=" + vehicleId,
dataType: "text",
success: callback
});
function callback(data){
document.getElementById("busyPeriods").innerHTML = data;
}
}

function vehicleView(vehicle){
$.ajax({
type: "GET",
url: "vehicleViews/" + vehicle + ".html",
data: null,
dataType: "text",
success: callbackVehicleView
});
function callbackVehicleView(data){
document.getElementById("vehicleView").innerHTML = data;
}
}

function checkingDates(){
var dateStart = document.getElementById("startDate").value;
var dateEnd = document.getElementById("endDate").value;
var vehicle = document.getElementById("vehicle").value;

$.ajax({
type: "POST",
url: "checkDates.php",
data: "dateStart=" + dateStart + "&dateEnd=" + dateEnd + "&vehicle=" + vehicle,
dataType: "text",
success: callback
});
function callback(data){
alert(data);
}
}
