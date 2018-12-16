<?php
require_once "core/init.php";

$token = md5(uniqid(rand(), true));
$_SESSION['token'] = $token;

$vehicles = allVehicles();

if(isset($_GET['vehId'])){
$vehId = trim($_GET['vehId']);
$vehId = strip_tags($vehId);
}
?>
<!doctype html>
<html lang="de">

<?php
require_once('includes/head2.php');
require_once('includes/header2.php');
?>

    <main id='startseite1'>
        <div class='container'>
            <div class='row'>
                <div class='col-lg-12'>
                    <h1 id='rentHead' style="text-align:center; margin-top: 100px;">Vermietung<br>Reservierungsanfrage</h1><br>
                </div>
            </div>
        </div>
        <div class='container'>
        <div class='col-lg-12'>


<form method="post" action="sendEmail.php" id='rentFormId' style="margin-top: 40px !important;">
<div class="panel panel-default justThisPanel">

<!--<div class="panel-body">  1 panel body -->
<!--<fieldset class="checkbox_container fieldSet1">  fieldset 1 start 
<legend>Verfügbarkeit Prüfen</legend>
<div class="form-row">
<div class="form-group col-md-6">
 početak Nebojšinog koda -->
<?php
/*
if(isset($vehicles)){
echo "<form id=\"reservationForm\">";
echo "<select onchange='busyPeriods(this)'>";
echo "<option value=\"\">Wählen</option>";
foreach($vehicles as $vehicle){
echo "<option value=\"$vehicle->vehicle_id\">$vehicle->vehicle</option>";
}
echo "</select>";
echo "</form>";
}
*/
?>

<!--<p>Sie können Perioden reservieren, die nicht belegt sind.</p>
</div>  form col 6 
</div> form row 1 -->


<!--<div class="form-row">
<div class="form-group col-md-6">
<div id="busyPeriods">
 nemoj da menjaš id ovog diva, tu će se prikazivati tabela sa datumima kada je vozilo zauzeto -->
<!-- </div>
</div> form col 6 
</div>  form row 2 -->



<!--</fieldset>  fieldset 
</div> div fieldset end --> 

<div class="panel-body"> <!-- 2 panel body -->
<fieldset class="checkbox_container fieldSet1"> <!-- fieldset 2 start -->
<legend style="font-family: 'Arial' !important;">Ihre Daten</legend>
<div class="form-row"> <!-- start of row -->
<div class="form-group col-md-6">
<label for="firstName">Vorname:</label>
<input type="text" name="firstName" id="firstName">
</div>

<div class="form-group col-md-6">
<label for="lastName">Nachname:</label>
<input type="text" name="lastName" id="lastName">
</div> <!-- col-md-6 -->
</div> <!-- ROW -->

<div class="form-row"> <!-- start of row -->
<div class="form-group col-md-6">
<label for="email">E-Mail:</label>
<input type="text" name="email" id="email">
</div> <!-- col-md-6 -->

<div class="form-group col-md-6">
<label for="phone">Telefon:</label>
<input type="text" name="phone" id="phone">
</div> <!-- col-md-6 -->

</div> <!-- ROW -->



</fieldset> <!-- fieldset -->
</div> <!--div fieldset end -->

<div class="panel-body"> <!-- 3 panel body -->
<fieldset class="checkbox_container fieldSet1"> <!-- fieldset 3 start -->
<legend style="font-family: 'Arial' !important;">Klasse Auswählen</legend>

<?php
if(isset($vehicles)){
echo "<label for=\"vehicle\">Klasse: </label>";
echo "<select name=\"vehicle\" id=\"vehicle\">";
echo "<option value=\"\">Wählen</option>";
foreach($vehicles as $vehicle){
?>
<option value="<?php echo $vehicle->vehicle_id . '|' . $vehicle->vehicle; ?>" <?php if(isset($vehId) && $vehId == $vehicle->vehicle_id) echo 'selected'; ?>><?php echo $vehicle->vehicle ?></option>
<?php
}
echo "</select>";
}
?>
<br>

<div class="form-row"> <!-- start of row -->
<div class="form-group col-md-6">
<label class='startEndD' for="startDate">Start:</label>
<input  type="text" name="dateStart" id="startDate" class="date datepickerClass" oninput="checkDateStart();">
</div> <!-- col-md-6 -->

<div class="form-group col-md-6">
<div id="checkDateStart"></div>
<label  class='startEndD' for="endDate">Ende:</label>
<input  type="text" name="dateEnd" id="endDate" class="date  datepickerClass">
</div> <!-- col-md-6 -->

</div> <!-- ROW -->


<input type="hidden" id="token" name="token" value="<?php if(isset($token)) echo $token ?>"><br>
<p>Formateingabe mit JJJJ-MM-TT oder Datum anklicken:</p>
</fieldset> <!-- fieldset -->
</div> <!--div fieldset end -->


<div class="panel-body"> <!-- 2 panel body -->
<fieldset class="checkbox_container fieldSet1"> <!-- fieldset 2 start -->
<!-- <legend style="font-family: 'Arial' !important;"><br></legend> -->

<!-- <p>Klicken Sie <span id="checkingDates" onclick="checkingDates()">hier</span> um zu sehen, ob die ausgewählten Daten für das ausgewählte Fahrzeug frei sind</p> -->
<div id="successMess" style="font-size: 20px; font-weight: bold; text-align: center;">
<!-- The messages about errors and success will be shown here -->
</div>

 
<input class="btn btn-info btn-lg" type="submit" name="submit" value="Abschicken" id="submit" style="border-radius:4px; width: 250px; display:block; margin: auto;">
</fieldset> <!-- fieldset -->
</div> <!--div fieldset end -->


</div> <!-- panel form DIV end ********************** -->
</form> <!--end of form  **************************-->



<script>
$( "#startDate" ).multiDatesPicker({dateFormat: "yy-mm-dd"});
$( "#endDate" ).multiDatesPicker({dateFormat: "yy-mm-dd"});

$("#submit").click(function(e){
e.preventDefault();

var fName = $("#firstName").val();
var lName = $("#lastName").val();
var email = $("#email").val();
var phone = $("#phone").val();
var vehicle = $("#vehicle").val();
var dateStart = $("#startDate").val();
var dateEnd = $("#endDate").val();
var token = $("#token").val();
var answer = "";

document.getElementById("successMess").innerHTML = answer;

if((fName == "") || (lName == "") || (email == "") || (phone == "") || (vehicle == "") || (dateStart == "") || (dateEnd == "")){
answer += "<p>Alle Felder müssen ausgefüllt und das Fahrzeug ausgewählt werden.</p>";
}

var emailRegEx = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
if(email != ""){
if(emailRegEx.test(email) == false)
  answer += "<p>Email ist ungültig.</p>";
}

var dateRegEx = /^([0-9]{4})-([0-9]{2})-([0-9]{2})$/

if(dateStart != ""){
if(dateRegEx.test(dateStart) == false)
  answer += "<p>Das Startdatum muss in der richtigen Form sein (JJJJ-MM-TT).</p>";
}

if(dateEnd != ""){
if(dateRegEx.test(dateEnd) == false)
  answer += "<p>Das Enddatum muss in der richtigen Form sein (JJJJ-MM-TT).</p>";
}

var today = new Date();
today.setHours(0,0,0,0);
var sDate = new Date(dateStart);
sDate.setHours(0,0,0,0);
var eDate = new Date(dateEnd);
eDate.setHours(0,0,0,0);

if(dateStart != ""){
if(sDate < today)
answer += "<p>Startdatum kann nicht in der Vergangenheit liegen.</p>";
}

if(dateEnd != ""){
if(eDate < today)
answer += "<p>Enddatum kann nicht in der Vergangenheit liegen.</p>";
}

if((dateStart != "") && (dateEnd != "")){
if(eDate < sDate)
answer += "<p>Das Enddatum kann nicht vor dem Startdatum liegen.</pp>";
}

if(answer != ""){
document.getElementById("successMess").innerHTML = answer;
}else{
$.ajax({
type: "POST",
url: "sendEmail.php",
data: "firstName=" + fName + "&lastName=" + lName + "&email=" + email + "&phone=" + phone + "&vehicle=" + vehicle + "&dateStart=" + dateStart + "&dateEnd=" + dateEnd + "&token=" + token,
dataType: "text",
success: callback
});
function callback(data){
document.getElementById("successMess").innerHTML = data;
document.getElementById("rentFormId").reset();
}
} // end else

});

</script>
            
</div>
</div>
 </main>




    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active"><a id='breadCont' href='./index.php'>Startseite</a></li>
            <li class="breadcrumb-item active" aria-current="#"> <a href='#'>Vermietung</a></li>
        </ol>
    </nav>
    <br>


<!-- footer from includes file-->
<?php 
require_once('includes/footer.php');
?>
<!-- footer from includes file-->
<!--modal 1-->
<?php
require_once('includes/modal1.php');
require_once('includes/modal3.php');
?>
<!-- modal 1-->



    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/holder/2.9.4/holder.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
    <script src='main.js'></script>
</body>
</html>
