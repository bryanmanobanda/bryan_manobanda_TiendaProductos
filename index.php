<?php
$preferencias = false;
$nombre = "";
$clave = "";

if(isset($_COOKIE["c_preferencias"]) && $_COOKIE["c_preferencias"]!=""){
    $preferencias = true;
    $nombre = isset($_COOKIE["c_nombre"])?$_COOKIE["c_nombre"]:"";
    $clave = isset($_COOKIE["c_clave"])?$_COOKIE["c_clave"]:"";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Pantalla Login</title>
</head>
<body>
    <h2>Pantalla: Login</h2>
    <div>
    <form method="POST" action="mipanel.php">
        <fieldset>
            <h1>LOGIN</h1>
            Usuario: </br>
            <input type="text" name="nombre" value="<?php echo $nombre;?>"/><br>
            Clave:<br>
            <input type="password" name="clave" value="<?php echo $clave;?>"/><br>
            <br>
            <input type="checkbox" name="preferencia" <?php echo (($preferencias)?"checked":"");?>/>Recordarme
            <br>
            <input type="submit" value="Enviar">
        </fieldset>
    </form>
    </div>
</body>
</html>