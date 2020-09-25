<?php 
// iniciar la secion
// si estas usando la session_name("algo"), ¡no lo olvide ahora!
session_start();
// destruir todos las variables de seción
$_SESSION = array();
// si desea destruir todo la secion completamente, borro la cooke de seción tambien
// ¡Nota!: esto destruirá la seción , y no la información de la seción 

if(ini_get("session.use_cookies")){
   $params = session_get_cookie_params();
   setcookie(session_name(), '' , time()- 42000,
   	$params["path"], $params["domain"],
   	$params["secure"], $params["httponly"]

);

}

// finalmnte la secion esta destruida
session_destroy();
// redigiremos esto a nuestros sitio de rgistros

header('location:../login.php');

 ?>