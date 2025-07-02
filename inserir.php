<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Aluno</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Cadastrar Aluno</h1>
    <form action="inserir_aluno.php" method="post" enctype="multipart/form-data">
        <label>Matrícula: <input type="text" name="matricula" required></label><br><br>
        <label>Nome: <input type="text" name="nome" required></label><br><br>
        <label>Foto: <input type="file" name="foto"></label><br><br>

        <h3>Notas - Português</h3>
        <input type="number" name="port1" step="0.01"> <input type="number" name="port2" step="0.01"> <input type="number" name="port3" step="0.01"> <input type="number" name="port4" step="0.01">
        <h3>Notas - Matemática</h3>
        <input type="number" name="mat1" step="0.01"> <input type="number" name="mat2" step="0.01"> <input type="number" name="mat3" step="0.01"> <input type="number" name="mat4" step="0.01">
        <h3>Notas - História</h3>
        <input type="number" name="hist1" step="0.01"> <input type="number" name="hist2" step="0.01"> <input type="number" name="hist3" step="0.01"> <input type="number" name="hist4" step="0.01">
        <h3>Notas - Geografia</h3>
        <input type="number" name="geo1" step="0.01"> <input type="number" name="geo2" step="0.01"> <input type="number" name="geo3" step="0.01"> <input type="number" name="geo4" step="0.01">
        <br><br>
        <input type="submit" value="Salvar">
    </form>
</body>
</html>
