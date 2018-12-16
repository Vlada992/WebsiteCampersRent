<!--h2>Login</h2>-->
<?php
$logToken = md5(uniqid(rand(), true));
$_SESSION['logToken'] = $logToken;

if(isset($_SESSION['logErrors'])){
$logErrors = $_SESSION['logErrors'];
foreach($logErrors as $logError){
echo "<p>" . $logError . "</p>";
}
unset($_SESSION['logErrors']);
}

if(isset($_SESSION['logSuccess'])){
echo $_SESSION['logSuccess'];
unset($_SESSION['logSuccess']);
}
?>
<form class='adminIndexForm' action="login.php" method="post">
<h2>LOGIN</h2><br>
<label class='adminLabel' for="userName">Nutzername:</label><br>  <!--username -->
<input name="userName" id="userName" required><br><br>
<label class='adminLabel' for="password">Passwort:</label><br>
<input type="password" name="password" id="password" required>
<input type="hidden" name="logToken" value="<?php echo $logToken ?>"><br><br>
<input class='loginAdmin1 text-center' type="submit" name="submit" value="Login" style="display: block; margin: auto !important; width: 75px;">
</form>
