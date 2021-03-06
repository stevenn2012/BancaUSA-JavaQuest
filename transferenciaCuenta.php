
<html>
<head>

  <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
  <script src="http://jqueryvalidation.org/files/dist/jquery.validate.min.js"></script>
  <script src="http://jqueryvalidation.org/files/dist/additional-methods.min.js"></script>
  <script type="text/javascript" src="UI/JS/java.js"></script>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/> 
	<META NAME="Author" CONTENT="P. Steven Puerto Montaño, Juliana Diaz, Felix Moreno">
	<title>BancaUSA.com</title>

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="ui/CSS/bootstrap.min.css">

	<!-- Optional theme -->
	<link rel="stylesheet" href="ui/CSS/bootstrap-theme.min.css">

	<!-- Latest compiled and minified JavaScript -->
	<script src="ui/js/bootstrap.min.js"></script>

	<!--Icono-->
  <link rel="SHORTCUT ICON" href="ui\Img\Pestaña.png">

  <!--estilo-->
  <link rel="stylesheet" type= "text/css" href="ui\CSS\Style2.css">
  <script type="text/javascript" src="ui/JS/clock.js"></script>
</head>
<body>	
      <div id = "head">
    </div>
    <div id = "menu">
      <ul class="nav nav-pills">
          <li role="presentation" class="active"><a href="transferenciaCuenta.php"><img src="ui/Img/trasnferencia.png" id="icons">&nbsp Transferencia a una Cuenta</a></li>
          <li role="presentation"><a href="transferencias.php"><img src="ui/Img/volver.png" id="icons">&nbsp Volver</a></li>
          <li role="presentation" id="clockbox"></li>
      </ul>
    </div>
     <?php
      session_start();
      $connection = mysqli_connect('localhost', 'root', '','banca');
    ?>
    <h3>&nbsp<img src="ui/Img/usuario.png" id="icons"> <?php echo "<span class='label label-info'>".$_SESSION['usuario']."</span>" ?></h3>
	<div id = "container">
   
	<div id="contenido">
		<div id="der2.1">
         <h3 id="titulo">Transferencia a una Cuenta</h3>
        
         <br>
         <fieldset id="consign">
         <form id="consignaForm" name="consignaForm"role="form" method="Post" action="ui/php/transaccion/transferencia.php">
          <fieldset>
            <legend>Transferencia</legend>
            <?php
            $query2="call consultaCuenta('".$_SESSION['id']."');";
            $result2=mysqli_query($connection, $query2);
            $row2=mysqli_fetch_assoc($result2);
            echo "<select id='selCue' name='selCue' class='form-control'>";
            for ($i=0; $i <mysqli_num_rows($result2); $i++) {
            echo "<option value=".$row2['numero_cuenta'].">".$row2['numero_cuenta']."</option>";
            $row2 = mysqli_fetch_assoc($result2);
            }
            echo "</select>"; 
                          ?>
             <br>
    			   <label id="lc" >Cuenta Destino:</label>
   				   <input class="form-control" id="cuentaDestino" name="cuentaDestino" placeholder="Ex: 1000">
             <br>
    			   <label id="labels">Monto:</label>
    			   <input class="form-control" id="monto" name="monto" placeholder="Ex: 100000">
             <br>
    			   <label id="labels">Clave:</label>
    			   <input type="password"class="form-control" id="clave" name="clave"> 
          </fieldset>
    
 
          <br><br>
  				<button type="submit" class="btn btn-default" id="consignaA" name="consignaA">Transferencia</button>
			</form>
      </fieldset>

      <div id="bot">
      <hr>
      <img src="ui/Img/bot.png">
    </div>
	</div>
	</div>

  </div>
</body>
</html>
