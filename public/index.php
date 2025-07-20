<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>form file</title>
</head>
<body>
    <form action="files.php" method="post" enctype="multipart/form-data">
        <input type="file" accept="image/*" name="upfile" id="upfile">
        <button type="submit">Enviar</button>
    </form>
</body>
</html>