<?php
session_start();

if(!isset($_SESSION["s_nombre"]) && !isset($_SESSION["s_clave"])){
    header("Location: index.php");
}else{
    if(isset($_SESSION)){
        if($_SESSION["s_preferencias"]==""){
            setcookie("c_nombre", "");
            setcookie("c_clave", "");
            setcookie("c_idioma", "");
            setcookie("c_preferencias", "");
        }
    }
}

session_destroy();
header("Location: index.php");
?>