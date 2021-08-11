<?php
  session_start();
  if (isset($_SESSION['user_id'])) {
    header("Location:index.php");
  }
  require 'database.php';
  if (!empty($_POST['usuario']) && !empty($_POST['password'])) {
    $user = $_POST['usuario'];
    $records = $conn->prepare('SELECT id, usuario, nombre, apellido, password, pass FROM users WHERE usuario = :usuario');
    $records->bindParam(':usuario', $_POST['usuario']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $message = '';

    if (count(array($results)) > 0 && password_verify($_POST['password'], $results['password'])) {
    //if (count(array($results)) > 0 && ($_POST['password']==$results['password']) ) {
      $_SESSION['user_id'] = $results['id'];
      $_SESSION['user'] = $results['pass'];
      header("Location:index.php");
    } else {
      $message = 'Contraseña o usuario incorrectoxxx';
    }
  }
?>
<!DOCTYPE html>
<html>
  <head>
   <link href="https://fonts.googleapis.com/css2?family=Prata&display=swap" rel="stylesheet">
   <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital@1&display=swap" rel="stylesheet">
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
   <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&display=swap" rel="stylesheet">
   <link href="assets/css/sesions.css" rel="stylesheet" type="text/css">
    <meta charset="utf-8">
    <br>
    <title>Iniciar Sesion</title>
  </head>
  <body style="background: url('img/tools-864983_1920.jpg'); " >
   <div class="cuadro">
       <?php if(!empty($message)): ?>
      <p> <?= $message ?></p>
    <?php endif; ?>
    <div class ="inicio"><a href="index.php"><i class="fas fa-home"></i></a></div>
    <h1>Iniciar sesi&oacute;n</h1>
    <h5>
    <span><a href="signup.php">Registrarse</a>
    </span></h5>
    <form action="login.php" method="POST">
      <input name="usuario" type="text" placeholder="Usuario" >
      <input name="password" type="password" placeholder="Contraseña">
      <input type="submit" value="Inicio">
    </form>
   </div>
  </body>
</html>
 