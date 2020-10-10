<?php
include('header.php');
include('conx.php');

$d = new DateTime();
$dia = $d->format('d');
$mes = $d->format('m');
$ano = $d->format('y');

$fecha = $ano.$ano.'-'.$mes.'-'.$dia;


$time = time();

$hora = date("H:i:s", $time);


$date = $fecha;
$date = strtotime($date);
$new_date = strtotime('+ 1 year', $date);
$fechaFinal =date('Y-m-d', $new_date);

/* Variables SIMOV */
$profile = $_POST['profile'];
$MUNICIPIO = $_POST['MUNICIPIO'];
$username = $_POST['username'];
$UsersID = $_POST['UsersID'];
$delegacionID = $_POST['delegacionID'];

/* Variables Form */
$licencia    = $_POST['licencia'];
$nombre      = $_POST['nombre'];
$paterno     = $_POST['paterno'];
$materno     = $_POST['materno'];
$domicilio = $_POST['domicilio'];
$rfc       = $_POST['rfc'];
$vigenciaLicencia = $_POST['vigencia'];
$choferes = $_POST['choferes'];

if(empty($nombre)){
$nombre = $_POST['nombresss'];

}

$reactivos=$_POST["reactivos"]; 

//recorremos el array de cervezas seleccionadas. No olvidarse q la primera posición de un array es la 0 
foreach ($_POST['reactivos'] as $value) {
      $drogas.= $value.", ";
        }
//tomo el valor de un elemento de tipo texto del formulario
$nombre_archivo = $_POST["archivo"];

//datos del arhivo
$nombre_fichero = $_FILES['archivo']['name'];
$tipo_archivo = $_FILES['archivo']['type'];
$tamano_archivo = $_FILES['archivo']['size'];
	
//compruebo si las características del archivo son las que deseo
if (!((strpos($tipo_archivo, "pdf") || strpos($tipo_archivo, "pdf")) && ($tamano_archivo < 10000000000))) {
}else{
   	if (move_uploaded_file($_FILES['archivo']['tmp_name'],  $nombre_fichero)){
      	//	echo "El archivo ha sido cargado correctamente.";
   	}else{
      	//	echo "Ocurrió algún error al subir el fichero. No pudo guardarse.";
   	}
}
  
if ($reactivos!="") {
    $laboratorio = 'REACTIVO';
}else{
    $laboratorio = 'NO REACTIVO';
}
   
$insertar = $mysqli->query("INSERT INTO tarjeton_".$MUNICIPIO." (imos_tarjeton_UsersID,imos_tarjeton_delegacionID, imos_tarjeton_nombre,imos_tarjeton_paterno,imos_tarjeton_materno,imos_tarjeton_rfc,imos_tarjeton_domicilio,imos_tarjeton_municipio,imos_tarjeton_lnumero,imos_tarjeton_laboratorio,imos_tarjeton_flaboratorio,imos_tarjeton_tipo_chofer,imos_tarjeton_drogas,imos_tarjeton_pdf,fecha_alta,hora_alta,fecha_vigencia_tarjeton)VALUES('$UsersID','$delegacionID','$nombre','$paterno','$materno','$rfc','$domicilio','$MUNICIPIO','$licencia','$laboratorio','$vigenciaLicencia','$choferes','$drogas','$nombre_fichero','$fecha','$hora','$fechaFinal')");
    if ($insertar) {
        echo '<script>
        $(document).ready(function() {
          swal({ 
            title: "Exito",
             text: "Su registro se agrego correctamente",
              type: "success",
              closeOnConfirm: false
            }).then(
                  function () {
			window.location.href = "laboratorioConsultaDev2.php?username='.$username.'&MUNICIPIO='.$MUNICIPIO.'&profile='.$profile.'&UsersID='.$UsersID.'&delegacionID='.$delegacionID.'&buscar='.$ide.'";		 
 }
            );
                });
      </script>';
    }else {
        echo("Error description: ".$mysqli -> error);
    }
    
    $mysqli->close();
?>
