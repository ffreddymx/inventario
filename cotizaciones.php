<!doctype html>
 <html class="no-js" lang=""> 
<head> }
        <?php
  session_start();

  require 'database.php';

  if (isset($_SESSION['user_id'])) {
    $records = $conn->prepare('SELECT id, nombre, apellido, usuario, password FROM users WHERE id = :id');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $user = null;

    if (count(array($results)) >= 0) {
      $user = $results;
    }
  } 


         if(!empty($_POST['codigo']))
            $cod = $_POST['codigo'];
              else $cod = "";


    ?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Mapac</title>
    <meta name="description" content="Mapac">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="img/logo-bg.jpg">
    <link rel="shortcut icon" href="img/logo-bg.jpg">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
       <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> 
    <link href="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/jqvmap@1.5.1/dist/jqvmap.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/weathericons@2.1.0/css/weather-icons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.css" rel="stylesheet" />

   <style>
    #weatherWidget .currentDesc {
        color: #ffffff!important;
    }
        .traffic-chart {
            min-height: 335px;
        }
        #flotPie1  {
            height: 150px;
        }
        #flotPie1 td {
            padding:3px;
        }
        #flotPie1 table {
            top: 20px!important;
            right: -10px!important;
        }
        .chart-container {
            display: table;
            min-width: 270px ;
            text-align: left;
            padding-top: 10px;
            padding-bottom: 10px;
        }
        #flotLine5  {
             height: 105px;
        }

        #flotBarChart {
            height: 150px;
        }
        #cellPaiChart{
            height: 160px;
        }

    </style>
</head>

<body>


<?php
include('partials/menu.php')
?>



        <div class="content">
            <div class="animated fadeIn">
                <div class="row">

                </div>
                <div class="clearfix"></div>
                <div class="orders">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card">

                                <div class="card-body bg-warning">
                                    <h4 class="box-title">Busque su cotización seleccionando la fecha</h4>
    
            <form method="POST" action="cotizaciones.php" >
                <div class="row form-group">
                    <div class="col-sm-2">
                        <label class="control-label" style="position:relative; top:7px;">Buscar por fecha:</label>
                    </div>
                    <div class="col-sm-4">
        <input type="date" class="form-control" name="codigo" value="" placeholder="Escriba el código del producto...">
                     </div>

<div class="col-sm-2">
<button type="submit" class="btn btn-danger" data-dismiss="modal"> Buscar</button>
 </div>
 <div class="col-sm-2">
<a href="cotizacionpdf.php?fecha=<?php echo $cod; ?>"  class="btn btn-info" data-dismiss="modal"> Imprimir</a>
 </div>
</form>
        </div>
            </div>
                                 <div class="card-body--">
                                    <div class="table-stats order-table ov-h">
                                        <table class="table ">
                                            <thead>
                                                <tr> 
                                                    <th>ID</th>
                                                    <th>Código</th>
                                                    <th>Nombre</th> 
                                                    <th>Detalles</th>
                                                    <th>Precio</th> 
                                                    <th>Cantidad</th> 
                                                    <th>Sub-total</th> 
                                                    <th>Opciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
			//incluimos el fichero de conexion
			include_once('dbconect.php');

			$database = new Connection();
			$db = $database->open();
            $user =  $_SESSION['user_id'];
			//try{	
$sql = "SELECT cotizar.id,cotizar.cantidad,products.codigo,products.name,cotizar.fecha,cotizar.precio,products.detalles FROM cotizar
                        inner join products on products.id = cotizar.idpro WHERE cotizar.fecha = '$cod' and user = '$user' ";
				
$total = 0;
                foreach ($db->query($sql) as $row) {
					?>
                                                <tr> 
                                                    <td><?php echo $row['id']; ?> </td>
                                                    <td><?php echo $row['codigo']; ?> </td>
                                                    <td>  <span class="name"><?php echo $row['name']; ?></span> </td>
                                                    <td><span class="name"><?php echo $row['detalles']; ?></span></td> 
                                                    <td><span class="name"><?php echo '$'.$row['precio']; ?></span></td>
                                                    <td><span class="name"><?php echo $row['cantidad']; ?></span></td>
                                                    <td><span class="name"><?php echo '$'.$row['cantidad']*$row['precio'] ; ?></span></td>
                                                    <td>
							<a href="#quitar_<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" data-toggle="modal"><span class="glyphicon glyphicon-edit"></span> Quitar</a>
						</td> 
                                                </tr>
                                                <tr class=" pb-0">                                 
						<?php include('BorrarEditarModalvender.php'); ?>
                                                </tr>

                                                <?php 
                 $total = $total + $row['cantidad']*$row['precio'];

				}


			$database->close();

		?>
                                                        <tr><td colspan="7" align="left">Total :$ <?php echo $total  ?> </td></tr>

                                            </tbody>
                                        </table>
                                    </div> 
                                </div>
                            </div> 
                        </div>  
                    </div>
                </div> 
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="../INVENTARIO/js/main2.js"></script>
<?php include('AgregarModalproductos.php'); ?> 
</body>
</html>