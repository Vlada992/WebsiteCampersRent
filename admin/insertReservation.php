<?php
require_once "core/init.php";

$allReservations = allReservations();
$vehicles = allVehicles();

if(isset($_GET['vehicleId'], $_GET['dateStart'], $_GET['dateEnd'], $_GET['firstName'], $_GET['lastName'], $_GET['email'], $_GET['phone'])){
$vehicleId = trim($_GET['vehicleId']);
$dateStart = trim($_GET['dateStart']);
$dateEnd = trim($_GET['dateEnd']);
$firstName = trim($_GET['firstName']);
$lastName = trim($_GET['lastName']);
$email = trim($_GET['email']);
$phone = trim($_GET['phone']);
$vehicleId = strip_tags($vehicleId);
$dateStart = strip_tags($dateStart);
$dateEnd = strip_tags($dateEnd);
$firstName = strip_tags($firstName);
$lastName = strip_tags($lastName);
$email = strip_tags($email);
$phone = strip_tags($phone);
}
?>
<!doctype html>
<html lang="de">

<head>
    <link rel="apple-touch-icon" sizes="57x57" href="../favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="../favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="../favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="../favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="../favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="../favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="../favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="../favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="../favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="../favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../favicon/favicon-16x16.png">
    <link rel="./manifest" href="./manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Wohnmobile</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link href="../carousel.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ"
    crossorigin="anonymous">
    <!--<link href="./dashboard.css" rel="stylesheet">-->
    <link href="../style.css" rel="stylesheet">
<script src="../js/script.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="../js/jquery-ui/external/jquery/jquery.js"></script>
<script src="../js/jquery-ui/jquery-ui.min.js"></script>
<script src="../js/Multiple-Dates-Picker-for-jQuery-UI/jquery-ui.multidatespicker.js"></script>
</head>

<body>

   <header>
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark bgDarkNew">
            <a id='indId1' class="navbar-brand rounded" href="../index.php"><img id='stajlLogo1' style='display:none;width:205px;height:70px' src='../images/menuMenuLogo1.png' />
                <img style='width:205px;height:70px' id='stajlLogo' src='../images/logo_menu.png' class="rounded">
                <!--logo text-->
                <h6 class='logoTxt'>
                    <img style='margin-top:-2%;' src='../images/old-typical-phoneLogo1.png' />
                    <a style='color:#999999!important' href='tel:49 151 58166222'>+49 151 58166222</a><br><br>
                    <img style='margin-top:-2%;' src='../images/openedMailLogo1.png' />
                    &nbsp;&nbsp;<a style='color:#999999!important' href="mailto:info@fernweh-wohnmobil.de">info@fernweh-wohnmobil.de</a>
                </h6>
                <!--logo text-->
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
                aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <!--<span class="navbar-toggler-icon"></span>-->
                <i style='color:#0293D1' class="fa fa-navicon"></i>

            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav mr-auto justify-content-end d-flex flex-fill">
                <li class="nav-item">
                        <a  class="nav-link nvLink nvLinkAdm"  href="reservations.php">Reservierungen verwalten</a>
                        <!-- Manage reservations-->
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nvLink nvLinkAdm"  href="updateUserName.php">Benutzernamen ändern</a>
                                                <!-- change user name-->
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nvLink nvLinkAdm"  href="updatePassword.php">Ändere das Passwort</a>
                                                <!-- change password-->
                    </li>
                    <li class="nav-item">
                        <a  class="nav-link nvLink"  href="index.php"><b>Admin-Startseite</b></a><!-- admin home-->
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nvLink"  href="../index.php"><b>Klient-Startseite</b></a>  <!-- client home-->

                    </li>
                </ul>
            </div>
        </nav>
    </header>


    <div class="container-fluid">
        <div class="row">

            <main  class='adminIndex' role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4 ">
                <!-- Početak Nebojšinog koda -->
<div class='adminIndclass' style='background-color:hsl(0,0%,88%)' id="logout">
<?php
if(isset($_SESSION['user_id'], $_SESSION['userName'])){
echo "<h3 class='adminH3' style='font-size:2rem;padding:2%'>&nbsp;&nbsp;Hallo " . $_SESSION['userName'] . "!</h3>";
?>
<div class='col-lg-12 col-md-12 col-sm-12'>  <!-- div class col-4 col-4 col-4 col-4 -->
<form  class='pull-right btn btn-danger' action="logout.php" method="post">
<input  class="btn btn-danger" type="submit" name="logout" value="Ausloggen">
</form>
</div> <!-- col-md-4 -->
<?php
}
?>
</div>
<?php
if(isset($_SESSION['user_id'])){
?>
<div class='col-lg-2 col-md-2 col-sm-2'> 
</div> <!-- col-md-2 col-lg-2 col col col col-->

<div class='col-lg-12 col-md-12 col-sm-12'>  <!--another col colo col col col col -->
<h2 class='adminH3' style='margin-top:2%;margin-bottom:2%'>Reservierung einfügen</h2>
<?php
if(isset($_SESSION['success'])){
echo "<p>" . $_SESSION['success'] . "</p>";
unset($_SESSION['success']);
}
if(isset($_SESSION['errors'])){
echo "</ul>";
foreach($_SESSION['errors'] as $error){
echo "<li>" . $error . "</li>";
}
echo "</ul>";
unset($_SESSION['errors']);
}
?>


<form class='adminIndex2'  method="post" action="insertReservationExecute.php">
<label for="firstName">Vorname:</label><br>
<input type="text" name="firstName" id="firstName" value="<?php if(isset($firstName)) echo $firstName ?>" required><br>
<label for="lastName">Nachname:</label><br>
<input type="text" name="lastName" id="lastName" value="<?php if(isset($lastName)) echo $lastName ?>" required><br>
<label for="email">E-mail:</label><br>
<input type="text" name="email" id="email" value="<?php if(isset($email)) echo $email ?>" required><br>
<label for="phone">Telefon:</label><br>
<input type="text" name="phone" id="phone" value="<?php if(isset($phone)) echo $phone ?>" required><br>
<?php
if(isset($vehicles)){
echo "<br><label for=\"vehicle\">Vehicle:&nbsp;&nbsp;&nbsp; </label>";
echo "<select name=\"vehicleId\" id=\"vehicle\">";
echo "<option value=\"\">Select</option>";
foreach($vehicles as $vehicle){
echo "<option value=\"$vehicle->vehicle_id\"";
if(isset($vehicleId)){
if($vehicle->vehicle_id == $vehicleId) echo "selected";
}
echo ">$vehicle->vehicle</option>";
}
echo "</select>";
}
?>
<br>
<label for="startDate">Anfangsdatum:</label><br>
<input type="text" name="dateStart" id="startDate" class="date" value="<?php if(isset($dateStart)) echo $dateStart ?>" required><br>
<label for="endDate">Endtermin:</label><br>
<input type="text" name="dateEnd" id="endDate" class="date" value="<?php if(isset($dateEnd)) echo $dateEnd ?>" required><br>
<p>(Der Benutzer kann das Datum manuell im Format eingeben: TT.MM.JJJJ oder das Feld eingeben und auf das gewünschte Datum klicken)</p>

<p>Klicken Sie <span id="checkingDates" onclick="checkingDates()">hier</span> um zu sehen, ob die ausgewählten Daten für das ausgewählte Fahrzeug frei sind</p>

<input style='padding-left:3%; padding-right: 3%; font-weight:800;font-size:20px' class='btn btn-info btn-lg' type="submit" name="submit" value="Einfügen">
</form>

</div> <!-- collg-12 col-12 col-12 col-12 12 12 12 12 -->

<script>
$( "#startDate" ).multiDatesPicker({dateFormat: "dd.mm.yy"});
$( "#endDate" ).multiDatesPicker({dateFormat: "dd.mm.yy"});
</script>

<?php
}else{
include_once "inc/widgets/loginForm.php";
}
?>
                <!-- kraj Nebojšinog koda -->
            </main>

        </div>
        <!--row-->
    </div>
    <!--container-fluid-->


    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active"><a id='breadAdm' href='../index.php'>Startseite</a></li>
            <li class="breadcrumb-item" aria-current="#"> <a id='breadAdm1' href='./index.php'>Adminseite</a></li>
            <li class="breadcrumb-item active" aria-current="#"> <a href='#'>Reservierung</a></li>

        </ol>
    </nav>
    <br>



<?php 
require_once('../includes/footer1.php');
require_once('../includes/modal4.php');

?>



    <!--  ovo dole sam ostavio ako zatreba slucajno lako cemo da izbrisemo -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/holder/2.9.4/holder.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src='../main.js'></script>
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
        feather.replace()
    </script>
</body>

</html>
