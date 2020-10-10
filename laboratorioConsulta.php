<?php
include('header.php');
/* Variables SIMOV */
/* $MUNICIPIO = htmlspecialchars($_GET["MUNICIPIO"]);
$profile = htmlspecialchars($_GET["profile"]);
$username = htmlspecialchars($_GET["username"]);
$UsersID = htmlspecialchars($_GET["UsersID"]);
$delegacionID = htmlspecialchars($_GET["delegacionID"]);
$screen = htmlspecialchars($_GET["screen"]);
$buscar = htmlspecialchars($_GET["buscar"]);
$elementoBuscar = htmlspecialchars($_GET["elementoBuscar"]);
 */
$MUNICIPIO = 'TIJUANA';
$profile = 2;
$username = "TARP";
$UsersID = 3;
$delegacionID = 2;
/* $screen = 3;
$buscar = 3;
$elementoBuscar = 44; */


?>
       <!-- Fila-->
      <div class="row contForm">
         <!-- Columna 1 -->
         <div class="col-sm text-right">
            <label><input type="checkbox" id="fantasma" class='fantasma' checked> LICENCIA</label><br>
         </div>
         <!-- Columna 2 -->
         <div class="col-sm">
            <form method="POST" action="laboratorioWS.php" id="ratings">
               <div class="row justify-content-md-center">
                  <input type="text" style="display:none" name="MUNICIPIO" id="MUNICIPIO" value="<?php echo $MUNICIPIO ?>">
                  <input type="text" style="display:none" name="profile" id="profile" value="<?php echo $profile; ?>">
                  <input type="text" style="display:none" name="username" id="username" value="<?php echo $username; ?>">
                  <input type="text" style="display:none" name="UsersID" id="UserID" value="<?php echo $UsersID; ?>">
                  <input type="text" style="display:none" name="delegacionID" id="delegacionID" value="<?php echo $delegacionID; ?>">
                  <!-- Input INE -->
                  <div class="col-md-12">
                     <div class='formaIne' id='formaIne' style='display:none'>
                        <label>Número de INE</label>
                        <input type="text" class="form-control" id="ine" name="ine" onkeyup="this.value = this.value.toUpperCase();" value="">
                     </div>
                  </div>
               </div>
               <!-- Input Licencia -->
               <div class="col-md-12">
                  <div class='formaLicencia' id='formaLicencia'>
                     <label for="firstName">Número de Licenciá</label>
                     <input type="text" class="form-control" id="licencia" name="licencia" onkeyup="this.value = this.value.toUpperCase();" value="">
                  </div>
               </div>
         </div>
         <!-- Columna 3 -->
         <div class="col-sm">
            <button id="submit_form" style="margin-top: 31px; margin-left:30px" type="submit" name="enviarRegistro" class="btn btn-secondary" id="btn">Enviar</button>
            </form>
         </div>
      </div>

   </div>
   <footer class="my-5 pt-5 text-muted text-center text-small">
      <p class="mb-1" style="padding-top: 100px;">&copy; IMOS | Gerencia de Sistemas | Registros Laboratorio | Version 3.3.3 | ▲</p>
   </footer>
   <!-- Loader -->
   <script src="hefestoLib/jsLab/fantasma.js"></script>
   <script src="hefestoLib/jsLab/loader.js"></script>
   <div id="loading" style="display: none;">
      <img id="loading-image" src="hefestoLib/imgLab/loaderFigures.gif" alt="Loading..." />
   </div>
   
</body>
</html>