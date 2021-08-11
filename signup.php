  <?php

  require 'database.php';

  $message = '';

  if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $sql = "INSERT INTO users (usuario,nombre,apellido,telefono,password) VALUES (:usuario,:nombre,:apellido,:telefono,:password)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':usuario',$_POST['email']);
    $stmt->bindParam(':nombre',$_POST['nombre']);
    $stmt->bindParam(':apellido',$_POST['apellido']);
      $stmt->bindParam(':telefono',$_POST['telefono']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $stmt->bindParam(':password', $password);

    if ($stmt->execute()) {
      $message = 'Usuario creado con éxito.';
    } else {
      $message = 'Lo sentimos, debe haber habido un problema al crear su cuenta.';
    }
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <br>
    <title>Registrarte</title>
   <link href="https://fonts.googleapis.com/css2?family=Prata&display=swap" rel="stylesheet">
   <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital@1&display=swap" rel="stylesheet">
   <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&display=swap" rel="stylesheet">
       <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/register.css">




  </head>
  <body style="background: url('img/casco.jpg')" >

  <div class="cuadro">
      <?php if(!empty($message)): ?>
      <p> <?= $message ?></p>
    <?php endif; ?>
 <div class ="inicio"><a href="index.php"><i class="fas fa-home"></i></a></div>
    <h1>Registrarse</h1>
    <h5><span><a href="login.php">Iniciar</a></span></h5>
    <form action="signup.php" method="POST">
      <input name="email" type="text" placeholder="Usuario">
      <input name="nombre" type="text" placeholder="Nombre">
      <input name="apellido" type="text" placeholder="Apellidos">
      <input name="telefono" type="text" placeholder="Número de telefono">
      <input name="password" type="password" placeholder="Contraseña">
      <input name="confirm_password" type="password" placeholder="Confirmar contraseña">
      <input type="submit" value="Guardar">
    </form>

  </div>
  </body>
</html>
