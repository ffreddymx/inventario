<!doctype html>
 <html class="no-js" lang=""> 
<head>  
<?php
  session_start();

  require 'database.php';

  if (isset($_SESSION['user_id'])) {
    $records = $conn->prepare('SELECT id, usuario, nombre, apellido, password FROM users WHERE id = :id');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $user = null;
    if (count($results) > 0) {
      $user = $results;
    }
  } 
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

<body style="background: url('img/1.jpg'); " >


<?php
include('partials/menu.php')
?>

    

        <div class="content">
            <div class="animated fadeIn">
                <div class="row"> 

                       <?php if($_SESSION['user'] == 0){?>     

                    <div class="col-lg-5 col-md-6">
                        <div class="card">
                        <img src="img/fondox.jpg" >
                    </div>
                </div>

                    <div class="col-lg-5 col-md-6">
                        <div class="card">
                        <img src="img/todo.jpg" >
                    </div>
                </div>

                    <div class="col-lg-5 col-md-6">
                        <div class="card">
                        <img src="img/casco.jpg" >
                    </div>
                </div>

                    <div class="col-lg-5 col-md-6">
                        <div class="card">
                        <img src="img/otros.jpg" height="300px">
                    </div>
                </div>

           <?php }  ?>     


           <?php if($_SESSION['user'] != 0){?>     

                    <div class="col-lg-5 col-md-6">
                        <a href="productos.php">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-2">
                                        <i class="pe-7s-cart"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text"> 
<span class="count">     <?php 
$count = $db->query("SELECT COUNT(*) as `num` FROM `products`")
->fetch(PDO::FETCH_ASSOC);   
                                                ?><?php echo $count['num']; ?></span></div>
                                            <div class="stat-heading">Productos</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>    
                    </div> 


                    <div class="col-lg-5 col-md-6">
                <a href="empleados.php">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-4">
                                        <i class="pe-7s-users"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text"><span class="count">
                                                <?php 
$count = $db->query("SELECT COUNT(*) as `num` FROM `users` where pass = 2")
->fetch(PDO::FETCH_ASSOC);   ?>
                                                <?php echo $count['num']; ?></span></div>
                                            <div class="stat-heading">Empleados</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                      </a>  
                    </div>

                    <div class="col-lg-5 col-md-6">

                <a href="clientes.php">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-4">
                                        <i class="pe-7s-users"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text"><span class="count">
                                                <?php 
$count = $db->query("SELECT COUNT(*) as `num` FROM `users` where pass = 0")
->fetch(PDO::FETCH_ASSOC);   ?>
                                                <?php echo $count['num']; ?></span></div>
                                            <div class="stat-heading">Clientes</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                     <a>   
                    </div>

                                               <?php } ?>     


                </div> 
            </div>
        </div> 
    </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="../INVENTARIO/js/main2.js"></script>

</body>
</html>