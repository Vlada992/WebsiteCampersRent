<?php
require_once "core/init.php";

$allReservations = allReservations();
$vehicles = allVehicles();
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
        <div class="row" style="margin-top: 20px;">

            <main  class='adminIndex' role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4 ">
                <!-- Početak Nebojšinog koda -->
                <div class='container'>

<div class='adminIndclass' style='background-color:hsl(0,0%,88%); margin-top: 20px;' id="logout">
<?php
if(isset($_SESSION['user_id'], $_SESSION['userName'])){
echo "<h3 style='padding:2%' class='adminH3'>Hallo " . $_SESSION['userName'] . "!</h3>";
?>
<form  class='pull-right btn btn-danger'  action="logout.php" method="post">
<input class='btn btn-danger'  type="submit" name="logout" value="Ausloggen">
</form>
<?php
}
?>
</div>
<?php
if(isset($_SESSION['user_id'])){
?>

<h2 class='adminH3' style='margin-top:4%;margin-bottom:0%'>Manage reservations</h2><br>
 <button style='margin-bottom:4%;max-width:100%;padding:1%!important' class='btn btn-success btn-lg'><a style='text-decoration:none;color:#fff;font-size:30px' href="insertReservation.php">Reservierung einfügen</a></button><br>
<!-- početak novog koda -->
<?php
if(isset($vehicles)){
echo "<form   id=\"reservationForm\" class=\"btn btn-lg btn-block\">";
echo "<select onchange='busyPeriods(this)'>";
echo "<option  value=\"\">&nbsp;&nbsp;Wählen&nbsp;&nbsp;</option>";
foreach($vehicles as $vehicle){
echo "<option value=\"$vehicle->vehicle_id\">$vehicle->vehicle</option>";
}
echo "</select>";
echo "</form>";
}
?>
<div id="busyPeriods">
<!-- nemoj da menjaš id ovog diva, tu će se prikazivati tabela -->
</div>
<!-- kraj novog koda -->
<script>
var question = "Sind Sie sicher, dass Sie diese Reservierung löschen möchten?";
</script>
<!--
<div class="table-responsive">          
<table style='background-color:hsl(0,0%,85%)'  class="table table-hover">
<thead>
<tr style='background-color:hsl(0,0%,65%)'>
<th>Num</th>
<th>Fahrzeug</th>
<th>Anfangsdatum</th>
<th>Endtermin</th>
<th>Klient</th>
<th>E-mail</th>
<th>Telefon</th>
<th>aktualisieren</th>
<th>löschen</th>                       
</tr>
</tbody>                   
-->
<!-- test test test NEW NEW NEW TABLE NEW TABLE-->


<?php
/*
if(isset($allReservations)){
static $num = 0;
foreach($allReservations as $reservation){
echo "<tr>";
echo "<td>" . ++$num . "</td>";
echo "<td>" . $reservation->vehicle . "</td>";
echo "<td>" . date('F d, Y', strtotime($reservation->date_start)) . "</td>";
echo "<td>" . date('F d, Y', strtotime($reservation->date_end)) . "</td>";
echo "<td>" . $reservation->first_name . " " . $reservation->last_name . "</td>";
echo "<td>" . $reservation->email . "</td>";
echo "<td>" . $reservation->phone . "</td>";
echo "<td><a href=\"updateReservation.php?id=$reservation->reservation_id\">Aktualisieren</a></td>";
echo "<td><a href=\"deleteReservation.php?id=$reservation->reservation_id\" onclick=\"return confirm(question);\">Döschen</a></td>";
}
}
*/
?>
<!--
</table>
</div>
-->
</div>
</div> <!-- container -->
<!--</table--> <!-- end of old table-->

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
            <li class="breadcrumb-item active"><a  id='breadAdm' href='../index.php'>Startseite</a></li>
            <li class="breadcrumb-item active" aria-current="#"> <a id='breadAdm1' href='./index.php'>Adminseite</a></li>
            <li class="breadcrumb-item active" aria-current="#"> <a href='#'>Reservierung 1</a></li>
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
