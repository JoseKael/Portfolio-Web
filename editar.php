<?php
// Inclui o arquivo de conexão com o banco de dados
include 'db.php';

// Pega o ID do aluno via GET e garante que seja um número inteiro para evitar SQL Injection
$id = intval($_GET['id']);

// Monta a consulta SQL para buscar os dados do aluno com o ID informado
$sql = "SELECT * FROM alunos WHERE id = $id";

// Executa a consulta no banco
$result = mysqli_query($conn, $sql);

// Obtém os dados do aluno em formato de array associativo
$aluno = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Aluno</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Editar Aluno</h1>

    <!-- Formulário de edição dos dados do aluno -->
    <!-- enctype="multipart/form-data" é necessário para enviar arquivos (foto) -->
    <form action="editar_aluno.php" method="post" enctype="multipart/form-data">

        <!-- Campo oculto com o ID do aluno para enviar ao editar_aluno.php -->
        <input type="hidden" name="id" value="<?php echo $aluno['id']; ?>">

        <!-- Campo de matrícula preenchido com valor atual -->
        <label>Matrícula: 
            <input type="text" name="matricula" value="<?php echo $aluno['matricula']; ?>" required>
        </label><br><br>

        <!-- Campo de nome preenchido com valor atual -->
        <label>Nome: 
            <input type="text" name="nome" value="<?php echo $aluno['nome']; ?>" required>
        </label><br><br>

        <!-- Campo de envio de nova foto (opcional) -->
        <label>Foto: 
            <input type="file" name="foto">
        </label><br><br>

        <!-- Campos de notas de Português -->
        <h3>Notas - Português</h3>
        <input type="number" name="port1" step="0.01" value="<?php echo $aluno['port1']; ?>">
        <input type="number" name="port2" step="0.01" value="<?php echo $aluno['port2']; ?>">
        <input type="number" name="port3" step="0.01" value="<?php echo $aluno['port3']; ?>">
        <input type="number" name="port4" step="0.01" value="<?php echo $aluno['port4']; ?>">

        <!-- Campos de notas de Matemática -->
        <h3>Notas - Matemática</h3>
        <input type="number" name="mat1" step="0.01" value="<?php echo $aluno['mat1']; ?>">
        <input type="number" name="mat2" step="0.01" value="<?php echo $aluno['mat2']; ?>">
        <input type="number" name="mat3" step="0.01" value="<?php echo $aluno['mat3']; ?>">
        <input type="number" name="mat4" step="0.01" value="<?php echo $aluno['mat4']; ?>">

        <!-- Campos de notas de História -->
        <h3>Notas - História</h3>
        <input type="number" name="hist1" step="0.01" value="<?php echo $aluno['hist1']; ?>">
        <input type="number" name="hist2" step="0.01" value="<?php echo $aluno['hist2']; ?>">
        <input type="number" name="hist3" step="0.01" value="<?php echo $aluno['hist3']; ?>">
        <input type="number" name="hist4" step="0.01" value="<?php echo $aluno['hist4']; ?>">

        <!-- Campos de notas de Geografia -->
        <h3>Notas - Geografia</h3>
        <input type="number" name="geo1" step="0.01" value="<?php echo $aluno['geo1']; ?>">
        <input type="number" name="geo2" step="0.01" value="<?php echo $aluno['geo2']; ?>">
        <input type="number" name="geo3" step="0.01" value="<?php echo $aluno['geo3']; ?>">
        <input type="number" name="geo4" step="0.01" value="<?php echo $aluno['geo4']; ?>">

        <br><br>
        <!-- Botão para enviar o formulário -->
        <input type="submit" value="Atualizar">
    </form>
</body>
</html>
