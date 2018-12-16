<?php
require_once "core/init.php";
?>
<!doctype html>
<html lang="de">

<?php
require_once('includes/head2.php');
require_once('includes/header2.php');
?>


    <main id='startseite1' role="main">
        <div class='container'>
            <div class='row'>
                <div class='col-lg-12'>
                    <h1 id='equipHead' style="text-align:center; margin-top: 100px; margin-bottom: 30px !important;">Kontakt</h1><br>
                </div>
            </div>

            <div id='contRow' class='row' style="margin-top: 0px;">
                <div class="col-lg-6">
                    <h2 class="jumbotron-heading">Ihr Kontakt zu uns</h2>
                    <br>
                    <p class="lead text-muted">&nbsp;&nbsp;<i class="fas fa-info"></i>&nbsp;&nbsp;Fernweh-Wohnmobilvermietung</p>
                    <p class="lead text-muted"><i class="fas fa-location-arrow"></i>&nbsp;&nbsp;Gosberger Strasse 27</p>
                    <p class="lead text-muted"><i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;&nbsp; 91361 Gosberg</p>
                </div>
                <div class='col-lg-6'>
                    <br><br><br><br><br>
                    <p class="lead text-muted"><i class="fa fa-phone" aria-hidden="true"></i>&nbsp;&nbsp; <a href="tel:+4915155778431" style="color: #0293D1;"> +49 151 55778431 </a></p>
                    <p class="lead text-muted"><i class="fa fa-envelope" aria-hidden="true"></i>&nbsp;&nbsp;
                    <a href="mailto:info@fernweh-wohnmobilvermietung.de" style="color: #0293D1;"> info@fernweh-wohnmobilvermietung.de</a></p>
                   
                </div>
            </div><!-- /.row -->
            <!--<div id='contRow1' class='row'>
                <div class="col-lg-6">
                    <h2 class="jumbotron-heading">Unsere Öffnungszeiten</h2>
                    <br>
                    <p class="lead text-muted">März - Oktober</p>
                    <p class="lead text-muted">Montag - Freitag </p>
                </div>
                <div class='col-lg-6'>
                    <br><br><br>
                    <p class="lead text-muted">November - Februar</p>
                    <p class="lead text-muted">+49 151 55778431</p>
                    <p class="lead text-muted">info@fernweh-wohnmobilvermietung.de</p>
                </div>
            </div> /.row -->
        </div>

        <!---->
        <div class="container contact-form col-lg-10" style="margin-top: 80px; margin-left: auto; margin-right: auto; width: 100% !important">
            <div class="contact-image">
                <img src="./images/menuMenuLogo1.png" alt="camper_contact" style="margin-top: 20px; width: 300px; padding: 2%" />
            </div>
            <form action="contactSendMail.php" method="post" id="contactForm">
                <h3><img style='margin-top:-2.5%' id='messageImg' src='./images/message2.png' />&nbsp;&nbsp; Schreiben
                    Sie uns eine Nachricht
                </h3>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input id="firstName" type="text" name="firstName" class="form-control" placeholder="Vorname *" value="" />
                        </div>
<div class="form-group">
                            <input id="lastName" type="text" name="lastName" class="form-control" placeholder="Nachname *" value="" />
                        </div>
                       
                        <div class="form-group">
                            <input id="email" type="text" name="email" class="form-control" placeholder="E-Mail *" value="" />
                        </div>
                        
                        <div class="form-group">
                            <input id="phone" type="text" name="phone" class="form-control" placeholder="Telefonnummer *" value="" />
                        </div>
<div class="form-group">
                            <input id="subject" type="text" name="subject" class="form-control" placeholder="Betreff *" value="" />
                        </div>

                        
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <textarea id="message" name="message" class="form-control" placeholder="Nachricht *" style="width: 100%; height: 150px;"></textarea>
                        </div>
                        <div id="successMess" style="font-size: 20px;"><br>
                        <!-- Messages about errors and success will be shown here -->
                        </div>
                        <div class="form-group pull-right">
                            <input id="submit" type="submit" name="submit" class="btn btn-info btn-lg" value="Nachricht senden" />
                        
                        </div>
                    </div>
                </div>
            </form>

<script>
$("#submit").click(function(e){
e.preventDefault();
var fName = $("#firstName").val();
var lName = $("#lastName").val();
var email = $("#email").val();
var phone = $("#phone").val();
var subject = $("#subject").val();
var message = $("#message").val();
var answer = "";

document.getElementById("successMess").innerHTML = answer;

if((fName == "") || (lName == "") || (email == "") || (phone == "") || (subject == "") || (message == "")){
answer += "<p>Alle Felder müssen ausgefüllt und das Fahrzeug ausgewählt werden.</p>";
}

var emailRegEx = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
if(email != ""){
if(emailRegEx.test(email) == false)
  answer += "<p>Email ist ungültig.</p>";
}

if(answer != ""){
document.getElementById("successMess").innerHTML = answer;
}else{
$.ajax({
type: "POST",
url: "contactSendMail.php",
data: "firstName=" + fName + "&lastName=" + lName + "&email=" + email + "&phone=" + phone + "&subject=" + subject + "&message=" + message,
dataType: "text",
success: callback
});
function callback(data){
document.getElementById("successMess").innerHTML = data;
document.getElementById("contactForm").reset();
}
} // end else

});
</script>
        </div>
        <!---->
    </main>




    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active"><a id='breadCont' href='./index.php'>Startseite</a></li>
            <li class="breadcrumb-item active" aria-current="#"> <a href='#'>Kontakt</a></li>
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
    <script src='main.js'></script>
</body>

</html>
