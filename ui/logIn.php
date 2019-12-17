<?php
include_once "ui/header.php";
$logInError=false;
if(isset($_POST['logIn'])){
	if(isset($_POST['email']) && isset($_POST['password'])){
		$user_ip = getenv('REMOTE_ADDR');
		$agent = $_SERVER["HTTP_USER_AGENT"];
		$browser = "-";
		if( preg_match('/MSIE (\d+\.\d+);/', $agent) ) {
			$browser = "Internet Explorer";
		} else if (preg_match('/Chrome[\/\s](\d+\.\d+)/', $agent) ) {
			$browser = "Chrome";
		} else if (preg_match('/Edge\/\d+/', $agent) ) {
			$browser = "Edge";
		} else if ( preg_match('/Firefox[\/\s](\d+\.\d+)/', $agent) ) {
			$browser = "Firefox";
		} else if ( preg_match('/OPR[\/\s](\d+\.\d+)/', $agent) ) {
			$browser = "Opera";
		} else if (preg_match('/Safari[\/\s](\d+\.\d+)/', $agent) ) {
			$browser = "Safari";
		}
		$email=$_POST['email'];
		$password=$_POST['password'];
		$administrator = new Administrator();
		if($administrator -> logIn($email, $password)){
			$_SESSION['id']=$administrator -> getIdAdministrator();
			$_SESSION['entity']="Administrator";
			$logAdministrator = new LogAdministrator("", "Log In", "", date("Y-m-d"), date("H:i:s"), $user_ip, PHP_OS, $browser, $administrator -> getIdAdministrator());
			$logAdministrator -> insert();
			echo "<script>location.href = 'index.php?pid=" . base64_encode("ui/sessionAdministrator.php") . "'</script>"; 
		}
		$profesor = new Profesor();
		if($profesor -> logIn($email, $password)){
			$_SESSION['id']=$profesor -> getIdProfesor();
			$_SESSION['entity']="Profesor";
			$logProfesor = new LogProfesor("", "Log In", "", date("Y-m-d"), date("H:i:s"), $user_ip, PHP_OS, $browser, $profesor -> getIdProfesor());
			$logProfesor -> insert();
			echo "<script>location.href = 'index.php?pid=" . base64_encode("ui/sessionProfesor.php") . "'</script>"; 
		}
		$secretaria = new Secretaria();
		if($secretaria -> logIn($email, $password)){
			$_SESSION['id']=$secretaria -> getIdSecretaria();
			$_SESSION['entity']="Secretaria";
			$logSecretaria = new LogSecretaria("", "Log In", "", date("Y-m-d"), date("H:i:s"), $user_ip, PHP_OS, $browser, $secretaria -> getIdSecretaria());
			$logSecretaria -> insert();
			echo "<script>location.href = 'index.php?pid=" . base64_encode("ui/sessionSecretaria.php") . "'</script>"; 
		}
		$logInError=true;
	}
}
?>
<div class="container mt-3 bgLog">
        <div class="card card-container">
            <!-- <img class="profile-img-card" src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" alt="" /> -->
            <img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" />
            <p id="profile-name" class="profile-name-card"></p>
            <form class="form-signin" method="post"  action="index.php?pid=<?php echo base64_encode("ui/logIn.php")?>">
                <span id="reauth-email" class="reauth-email"></span>
                <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Correo electrónico" required autofocus>
                <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Contraseña" required>
                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit" name="logIn">Ingresar</button>
            </form><!-- /form -->
            <a href="index.php?pid=<?php echo base64_encode("ui/recoverPassword.php")?>" class="forgot-password">
                Olvidaste la contaseña?
            </a>
        </div><!-- /card-container -->
    </div><!-- /container -->
