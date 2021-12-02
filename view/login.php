<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Actividades de Barcelona</title>
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
    <script src="../js/code.js"></script>
</head>
<body class="body-login">
    <div class="region-login">
  
            <div class="login">
                <form action="../processes/login.php" method="POST"class="login-form" onsubmit="return validar_login()">
                    <label for="username">Introduze tu correo</label>
                    <input type="email" placeholder="admin1@gmail.com" id="login_username" class="login-input_username" name="username">
                    <label for="password">Introduze tu contraseña</label>
                    <input type="password" placeholder="Password" id="login_password" class="login-input_password" name="password">
                    <input type="submit" name="enviar" value="Iniciar sesión" id="login_btn_enviar" class="login-btn_enviar">
                </form>
                
            </div>
      
    </div>
</body>
</html>