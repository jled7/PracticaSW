<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<HTML>
<HEAD>
	<TITLE>Registro</TITLE>
	<LINK rel="STYLESHEET" href="estilos/default.css" type="text/css">
  <script type="text/javascript" src='js/script.js'></script>
	<META charset="utf-8">
</HEAD>
<BODY>
	<DIV class="container_form">
		<DIV class='title'>
      <h1>Registro</h1>
    <hr>
      </DIV><center>
<?php
include("config.php");
if (empty($_POST[Email]) || empty($_POST[Nombre]) || empty($_POST[Apellido1]) || empty($_POST[Apellido2]) || empty($_POST[Password]) || empty($_POST[Telefono]))
{
	die('Error: Campos vacíos. <br><br>  </center></DIV> <p><center><a href="layout.html">Atrás</a></center></p></BODY></HTML>');

}

$otro= $_POST['Especialidad'];


if (strcmp ($otro, "Otros")==0)
{
	$otro=$_POST['otraEspecialidad'];
}

$file = $_FILES["foto"]["tmp_name"];
if(empty($file)) {
	$sql="INSERT INTO usuario(email, nombre, primerapellido, segundoapellido, password, telefono, especialidad, intereses, foto) VALUES
	('$_POST[Email]','$_POST[Nombre]','$_POST[Apellido1]','$_POST[Apellido2]','$_POST[Password]','$_POST[Telefono]', '$otro' ,'$_POST[Intereses]', NULL)";
} else {
	$image = addslashes(file_get_contents($file));
	$sql="INSERT INTO usuario(email, nombre, primerapellido, segundoapellido, password, telefono, especialidad, intereses, foto) VALUES
	('$_POST[Email]','$_POST[Nombre]','$_POST[Apellido1]','$_POST[Apellido2]','$_POST[Password]','$_POST[Telefono]', '$otro' ,'$_POST[Intereses]', '$image')";
}

if (!mysql_query($sql))
{

die('Error: ' . mysql_error() . '<br><br>  </center></DIV> <p><center><a href="layout.html">Atrás</a></center></p></BODY></HTML>');
}
echo "1 record added";
mysql_close();
echo "<p> <a href='verUsuariosConFoto.php'> Ver usuarios </a>";
?>

 </center></DIV>
    <p><center><a href="layout.html">Atrás</a></center></p>
</BODY>
</HTML>
