<?php include './clases/Coneccion.php';?>
<?php
session_start();

if(isset($_SESSION['barra'])) {?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta property="og:title" content="Simulador de votación"/>
<link rel="shortcut icon" href="imgs/deka.png">
<title>Sistema de votación</title>


<link href="./css/style.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="./libs/bootstrap/css/bootstrap.css">



<style type="text/css">

.bloque{
  position: relative;
  display: inline-block;
  margin: auto 0;
  margin-left: 45px;
  margin-right: 45px;
  padding: 10px 0px 0 10px;

}


ul,ol {
      list-style: none;

      }

div > li > img {
  float: left;
}


</style>

</head>
<body class="inicio">

<header>
<img src="img/JHMP.png"><br><br>

<p>ELECCIONES CONCEJOS MUNICIPALES</p>
</header>
 <div>

    <?php

$sql = 'SELECT * FROM inscri_partido';
        $datoss =  consultaD($con, $sql);
foreach ($datoss as $key)



 {

    print('

        <div class="bloque">
         <form action="manejadorAlcaldes.php?accion=save" method="post">
            <div>
            <input type="hidden" name="candidatura" value="Alcaldes">
            <input type="hidden" name="var1" value="'.$_REQUEST['var1'].'">
            <input type="hidden" name="var2" value="'.$_REQUEST['var2'].'">
            <input type="hidden" name="var3" value="'.$_REQUEST['var3'].'">
            </div>
            <input type="hidden" name="voto" value='.$key['nombre_partido'].'>
            <img src='.$key['bandera'].'  width="200" height="150"  /><br>
            <input type="submit" name="bot" value="Votar" class="btn btn-primary">
            </form>
          </div>

            ');


 }

?>

<br><br><br>

</body>
</html>
<?php }else{
    header("Location:dui.php");
 } ?>