<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="../processes/register.proc.php" method="post">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre">
        <label for="correo">Correo</label>
        <input type="email" name="correo">
        <label for="dni">DNI/NIE</label>
        <input type="text" name="dni">
        <input type="hidden" name="evento" value="6">
        <input type="submit" value="Apuntarte">
    </form>
</body>
</html>