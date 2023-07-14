<?php

session_start();



$email = $_POST['email1'];
$senha = $_POST['senha1'];


if((!$email) || (!$senha)){

	echo "Por favor, todos campos devem ser preenchidos! <br><br>";
	
	include "loginpage.php";

}
else{

	$senha_encriptada = md5($senha);

include "config.php";

	$sql = mysql_query("SELECT * FROM usuario WHERE email='{$email}' AND senha='{$senha_encriptada}'");
	
	$login_check = mysql_num_rows($sql);

	if($login_check > 0){

		while($row = mysql_fetch_array($sql)){

			foreach( $row AS $key => $val ){

				$$key = stripslashes( $val );

			}



            $_SESSION['email'] = $email;
            if ($row['membrocppd'] == 1) {
                header("Location: membrocppd.php");
            } else {
                header("Location: restrito.php");
            }
        }
    }
	else{

		?>
		<script>
		
			alert("Você não pode logar-se!\nEste usuário e/ou senha não são válidos!\nPor favor tente novamente ou contate o adminstrador do sistema!")
		
		</script>
		<?php
		//echo " Você não pode logar-se! <br> Este usuário e/ou senha não são válidos!<br>
			//Por favor tente novamente ou contate o adminstrador do sistema!<br>";

		include "loginpage.php";

	}
}

?>