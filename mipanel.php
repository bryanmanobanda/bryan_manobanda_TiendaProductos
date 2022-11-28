<?php
session_start();

if(isset($_COOKIE["c_nombre"]) && isset($_POST["nombre"])){
    $_SESSION["s_idioma"] = ($_COOKIE["c_nombre"] == $_POST["nombre"])?($_COOKIE["c_idioma"]):"ES";
}else if(!isset($_POST["nombre"])){
    $_SESSION["s_idioma"] =($_GET["idioma"])=="ES"?"ES":"EN";
}else{
    $_SESSION["s_idioma"] = "ES";
}

if(isset($_POST["nombre"]) && isset($_POST["clave"]) && $_POST["nombre"] != "" && $_POST["clave"] != ""){
    $_SESSION["s_nombre"] = $_POST["nombre"];
    $_SESSION["s_clave"] = $_POST["clave"];
    $_SESSION["s_preferencias"] = (isset($_POST["preferencia"]))?$_POST["preferencia"]:"";
}

if(!isset($_SESSION["s_nombre"]) && !isset($_SESSION["s_clave"])){
    header("Location: index.php");
    exit;
}

if($_SESSION["s_preferencias"] != ""){
    setcookie("c_nombre", $_SESSION["s_nombre"], time()+(60*60*24));
    setcookie("c_clave", $_SESSION["s_clave"], time()+(60*60*24));
    setcookie("c_preferencias", $_SESSION["s_preferencias"], time()+(60*60*24));
    setcookie("c_idioma",  $_SESSION["s_idioma"], time()+(60*60*24));
}else if($_SESSION["s_preferencias"]==""){
    setcookie("c_nombre", "");
    setcookie("c_clave", "");
    setcookie("c_idioma", "");
    setcookie("c_preferencias", "");
}

$datos = "categorias_".($_SESSION["s_idioma"]=="ES"?"es.txt":"en.txt");

?>

<html>
    <head>
        <title>Panel Principal</title>
    </head>
    <body>
        <h2>Pantalla:Panel Principal</h2>
        <fieldset>
            <h1>PANEL PRINCIPAL</h1>
            <h3>Bienvenido Usuario: <?php echo $_SESSION["s_nombre"]?></h3>
            <br>
            <a href="mipanel.php?idioma=ES">ES (Español)</a> |
            <a href="mipanel.php?idioma=EN">EN (English)</a>
            <br>
            <br>
            <a href="cerrarsesion.php">Cerrar Sesion</a>
            <h2><?php echo $_SESSION["s_idioma"]=="ES"? "Lista de Productos":"Product List" ?></h2>
            <?php
                $fp = fopen($datos, "r");
                while (!feof($fp)){
                    $linea = fgets($fp);
                    echo $linea. "<br>";
                }
                fclose($fp);
            ?>
            <br>
        </fieldset>
    </body>
</html>