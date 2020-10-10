<?php
include('header.php');
include('funcionws.php');
include('conx.php');
/* include('con.php'); */
$d          = new DateTime();
$dia        = $d->format('d');
$mes        = $d->format('m');
$ano        = $d->format('y');
$fecha      = $dia . '-' . $mes . '-' . $ano . $ano;
$anomas     = strtotime(strtotime($ano + 1));
$date       = $fecha;
$date       = strtotime($date);
$new_date   = strtotime('+ 1 year', $date);
$fechaFinal = date('d-m-Y', $new_date);
$ine   =  $_POST['ine'];
$licencia   =  $_POST['licencia'];

$curl = curl_init();

if ($ine != '') {
   $licencia = $ine;
};

   $servicioLicencia = wsLicencia('licencia',$licencia);

$valor = explode('teseo',$servicioLicencia);

$licenciaWS = $valor[1];
$apellidopWS = $valor[2];
$apellidomWS = $valor[3];
$nombreWS = $valor[4];
$calleWS = $valor[6];
$numeroWS = $valor[7];
$coloniaWS = $valor[8];
$cpWS = $valor[9];
$municipioWS = $valor[10];
$estadoWS = $valor[11];
$fechaExpWS = $valor[12];
$fechaVencWS = $valor[13];
$tipoVigenciaWS = $valor[14];
$tipoLicWS = $valor[15];
$rfcWS = $valor[16];
$homoWS = $valor[17];

$cadena = $nombreWS. " ". $apellidopWS. " ". $apellidomWS;
$domicilio = $calleWS. " ".$numeroWS. " ".$coloniaWS. " ".$cpWS;




$profile = $_POST['profile'];
$MUNICIPIO = $_POST['MUNICIPIO'];
$username = $_POST['username'];
$UsersID = $_POST['UsersID'];
$delegacionID = $_POST['delegacionID'];
/* $screen = $_POST['screen'];
$buscar = $_POST['buscar']; */

?>
<div class="row contWS">
   <div class="col-sm contName">
      <form method="POST" action="insertarRegistroLab.php" enctype="multipart/form-data">
         <input type="text" style="display:none" name="MUNICIPIO" id="MUNICIPIO" value="<?php echo $MUNICIPIO ?>">
         <input type="text" style="display:none" name="profile" id="profile" value="<?php echo $profile; ?>">
         <input type="text" style="display:none" name="username" id="username" value="<?php echo $username; ?>">
         <input type="text" style="display:none" name="UsersID" id="UserID" value="<?php echo $UsersID; ?>">
         <input type="text" style="display:none" name="delegacionID" id="delegacionID" value="<?php echo $delegacionID; ?>">
         <input type="text" style="display:none" name="licencia" value="<?php print($licencia); ?>" onkeyup="this.value = this.value.toUpperCase();">

         <label for="firstName">Nombre Conductor</label>
         <input type="text" class="form-control" id="firstName" name="cadena" placeholder="" value="<?php print($cadena); ?>" onkeyup="this.value = this.value.toUpperCase();">

         <div class="col-6" style="display: none;">
            <label for="firstName">nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="" value="<?php print($nombreWS); ?>" onkeyup="this.value = this.value.toUpperCase();">
         </div>

         <div class="col-6" style="display: none;">
            <label for="firstName">paterno</label>
            <input type="text" class="form-control" id="paterno" name="paterno" placeholder="" value="<?php print($apellidopWS); ?>">
         </div>

         <div class="col-6" style="display: none;">
            <label for="firstName">materno</label>
            <input type="text" class="form-control" id="materno" name="materno" placeholder="" value="<?php print($apellidomWS); ?>">
         </div>

         <div class="col-md-4" style="display: none;>
               <label for=" firstName">DOMICILIO</label>
            <input type="text" class="form-control" id="domicilio" name="domicilio" placeholder="" value="<?php print($domicilio); ?>">
         </div>


         <div class="col-md-4" style="display: none;>
               <label for=" firstName">MUNICIPIO</label>
            <input type="text" class="form-control" id="municipio" name="municipio" placeholder="" value="<?php print($municipio); ?>">
         </div>


         <div class="col-md-4" style="display: none;>
               <label for=" firstName">RFC</label>
            <input type="text" class="form-control" id="rfc" name="rfc" placeholder="" value="<?php print($rfcWS); ?>">
         </div>


         <div class="col-md-4" style="display: none;>
               <label for=" firstName">VIGENCIA</label>
            <input type="text" class="form-control" id="vigencia" name="vigencia" placeholder="" value="<?php print($fechaVencWS); ?>">
         </div>
   </div>
   <script src="hefestoLib/jsLab/function.js"></script>
   <div class="col-sm check text-center">
      <label for=" firstName">Resultado: &nbsp;&nbsp;&nbsp;</label>
      <label class="switchBtn">
         Resultado
         <input type="checkbox" id="myCheck" name="mycheck" onclick="myFunction()">
         <div class="slide round">REACTIVO</div>

      </label>
   </div>

   <div class="col-sm text-left selectTipo">

      <label for=" firstName">Tipo: &nbsp;&nbsp;&nbsp;</label>
      <select class="select" id='choferes' name='choferes' check();>
         <option value="0">Seleccione:</option>
         <?php
         $query = $mysqli->query("SELECT * FROM choferes");
         while ($valores = mysqli_fetch_array($query)) {
            echo '<option value="' . $valores[choferes_tipo] . '">' . $valores[choferes_tipo] . '</option>';
         }
         ?>
      </select>

   </div>


</div>
<div class="row">
   <div class="col-sm archivo ">
      <input type="hidden" name="limite" value="30000" />
      <input type="file" id="archivo" name="archivo" multiple style="display:none;margin-top:3%;" class="my-2 pt-2 text-muted text-center text-small">
   </div>

   <div class="col-sm text-left selectTipoDrogos" id="reactivos" style="display:none">

      <select size=8 multiple name="reactivos[]" multiple '>
      <option value="ANFETAMINAS">ANFETAMINAS</option>
      <option value="COCAINA">COCAINA</option>
      <option value="MENTAFETAMINAS">MENTAFETAMINAS</option>

      <option value="OPIACEOS">OPIACEOS</option>
      <option value="THC">THC</option>
      ...
   </select>
    </div>
    

</div>

<div class="my-1 pt-5 text-muted text-center text-small">
      <button type="submit" name="enviarRegistro" class="btn btn-secondary" id="btn">Enviar</button>
   </div>

   <footer class="my-5 pt-5 text-muted text-center text-small">
      <p class="" style="padding-top: 15px; color:#fff">&copy; IMOS | Gerencia de Sistemas | Registros Laboratorio | Version 3.3.3 | ▲</p>
   </footer>
  
</body>

</html>