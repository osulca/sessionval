<?php
if(!isset($_COOKIE["contador"])){
    setcookie("contador", 1 , time()+60);
    echo "Primera vez";
}else{
    setcookie("contador", $_COOKIE["contador"]+1 , time()+60);
    echo "nos visita ".$_COOKIE["contador"]." veces";
}
?>


