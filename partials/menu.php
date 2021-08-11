
    <aside id="left-panel" class="left-panel  bg-dark">
        <nav class="navbar navbar-expand-sm navbar-default  bg-dark ">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="menu-title">Ventanas</li>


           <?php if($_SESSION['user'] != 0){?>     
           



                    <li class="menu-item-has-children dropdown">
                        <a honclick="location.href='empleados.php'"  class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="cursor:pointer"> <i class="menu-icon fa fa-address-card"></i>Cuentas</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-tools"></i><a onclick="location.href='empleados.php'" style="cursor:pointer">Usuarios</a></li>
                            <li><i class="menu-icon fa fa-tools"></i><a onclick="location.href='clientes.php'" style="cursor:pointer">Clientes</a></li>                           
                        </ul>

                    </li> 


                    <li class="menu-item-has-children dropdown">
                        <a honclick="location.href='productos.php'" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="cursor:pointer"> <i class="menu-icon fa fa-wrench" ></i>Operaciones
                        </a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-tools"></i><a onclick="location.href='vender.php'" style="cursor:pointer">Vender</a></li>
                            <li><i class="menu-icon fa fa-tools"></i><a onclick="location.href='vender.php'" style="cursor:pointer">Comprar</a></li>                           
                        </ul>
                    </li>


                    <li class="menu-item-has-children dropdown">
                        <a honclick="location.href='productos.php'" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="cursor:pointer"> <i class="menu-icon fa fa-chart-line" ></i>Productos</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-tools"></i><a onclick="location.href='productos.php'" style="cursor:pointer">Bodega</a></li>
                            <li><i class="menu-icon fa fa-tools"></i><a onclick="location.href='vendidos.php'" style="cursor:pointer">Ventas</a></li>                             
                            <li><i class="menu-icon fa fa-tools"></i><a onclick="location.href='compras.php'" style="cursor:pointer">Compras</a></li>                           
                             <li><i class="menu-icon fa fa-tools"></i><a onclick="location.href='departamentos.php'" style="cursor:pointer">Departamentos</a></li>
                        </ul>
                    </li>
                    
                                               <?php } ?>     


                    <li class="menu-item-has-children dropdown">
                        <a honclick="location.href='productos.php'" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="cursor:pointer"> <i class="menu-icon fa fa-box-open" ></i>Cotización</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-tools"></i><a onclick="location.href='cotizar.php'" style="cursor:pointer">Cotizar</a></li>
                            <li><i class="menu-icon fa fa-tools"></i><a onclick="location.href='cotizaciones.php'" style="cursor:pointer">Cotizaciones</a></li>              
                        </ul>
                    </li>




                </ul>
            </div>
        </nav>
    </aside>

    
    <div id="right-panel" class="right-panel">
        
        <header id="header" class="header">
            <div class="top-left">
                <div class="navbar-header">
                    <a class="navbar-brand" href="./"><img src="img/logo.jpg" alt="Logo" width="35px"></a>
                    <a class="navbar-brand hidden" href="./"><img src="images/logo.jpg" alt="Logo"></a>
                    <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
                </div>
            </div>
            <div class="top-right">
                <div class="header-menu">
                    <div class="header-left">
                        <div class="form-inline">
                        </div>
                    </div>
<h1 align="left">Ferreteria Ixtacomitan</h1>
                    <div class="user-area dropdown float-right">

                        <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <p align="center"></p>
                            <p><?php 
                                echo $user['nombre'];?></p>
                             <?php
			//incluimos el fichero de conexion
			include_once('dbconect.php'); 
			$database = new Connection();
			$db = $database->open();
			try{	
				$sql = 'SELECT * FROM sold';
				foreach ($db->query($sql) as $row) {
					?>
					<?php 
				}
			}
			catch(PDOException $e){
				echo "Hubo un problema en la conexión: " . $e->getMessage();
			}

			//Cerrar la Conexion
			$database->close();

		?>
                        </a>

                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" onclick="location.href='logout.php'" style="cursor:pointer"><i class="fa fa-power -off"></i>Cerrar sesión</a>
                        </div>
                    </div>

                </div>
            </div>
        </header>
