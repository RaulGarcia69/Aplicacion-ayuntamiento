<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="apuntar">
        <h1>Apúntate!</h1>
        <form action="../processes/register.proc.php" method="POST" enctype="multiplat/form-dataz">
            <div class="form1">
            <label class="form2" for="dni">DNI:</label>
            <div class="form3">
                <input type="text" class="form-control" id="dni" name="dni" placeholder="Introduce un dni">
            </div>
            </div>
            <div class="form1">
            <label class="form2" for="nombre">Nombre:</label>
            <div class="form3">
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Introduce tu nombre">
            </div>
            </div>
            <div class="form1">
            <label class="form2" for="primerapellido">Primer apellido:</label>
            <div class="form3">
                <input type="text" class="form-control" id="primerapellido" name="primerapellido" placeholder="Introduce tu primer apellido">
            </div>
            </div>
            <div class="form1">
            <label class="form2" for="segundoapellido">Segundo apellido:</label>
            <div class="form3">
                <input type="text" class="form-control" id="segundoapellido" name="segundoapellido" placeholder="Introduce tu segundo apellido">
            </div>
            </div>
        </form>
    </div>
</body>
</html>
