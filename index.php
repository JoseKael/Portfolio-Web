<?php
session_start(); // Inicia a sessão para controlar o acesso do usuário

// Verifica se o usuário está logado. Se não estiver, redireciona para a tela de login.
if (!isset($_SESSION['logado'])) {
    header("Location: login.php"); // Redireciona para o login
    exit; // Interrompe a execução do script
}
?>

<?php
include 'db.php'; // Inclui a conexão com o banco de dados

// Seleciona todos os registros da tabela 'alunos'
$sql = "SELECT * FROM alunos";
$result = mysqli_query($conn, $sql); // Executa a consulta e guarda o resultado
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de Alunos</title>
    <link rel="stylesheet" href="style.css"> <!-- Link para o CSS da página -->
</head>
<body>
    <!-- Link para sair do sistema, encerrando a sessão -->
    <a href="logout.php">Sair do usuario</a>

    <h1>Lista de Alunos</h1>

    <!-- Link para o formulário de cadastro de novo aluno -->
    <a href="inserir.php">Cadastrar Novo Aluno</a>

    <!-- Formulário de busca por matrícula -->
    <form action="buscar.php" method="get" style="margin-top: 20px;">
        <label for="matricula">Buscar por Matrícula:</label>
        <input type="text" name="matricula" id="matricula" required>
        <input type="submit" value="Buscar">
    </form>
<br>
    <!-- Tabela de exibição dos alunos e suas notas -->
    <table>
        <tr>
            <th>Foto</th>
            <th>Matrícula</th>
            <th>Nome</th>
            <th colspan="4">Português</th>
            <th colspan="4">Matemática</th>
            <th colspan="4">História</th>
            <th colspan="4">Geografia</th>
            <th>Ações</th>
        </tr>
        <tr>
            <th></th><th></th><th></th>
            <th>N1</th><th>N2</th><th>N3</th><th>N4</th>
            <th>N1</th><th>N2</th><th>N3</th><th>N4</th>
            <th>N1</th><th>N2</th><th>N3</th><th>N4</th>
            <th>N1</th><th>N2</th><th>N3</th><th>N4</th>
            <th></th>
        </tr>

        <!-- Laço que percorre todos os alunos retornados do banco -->
        <?php while ($a = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <!-- Exibe a imagem se houver uma foto cadastrada -->
            <td>
                <?php 
                if ($a['foto']) 
                    echo "<img src='uploads/{$a['foto']}' width='50'>"; 
                ?>
            </td>

            <!-- Exibe a matrícula e nome do aluno -->
            <td><?php echo $a['matricula']; ?></td>
            <td><?php echo $a['nome']; ?></td>

            <!-- Notas de Português -->
            <td><?php echo $a['port1']; ?></td>
            <td><?php echo $a['port2']; ?></td>
            <td><?php echo $a['port3']; ?></td>
            <td><?php echo $a['port4']; ?></td>

            <!-- Notas de Matemática -->
            <td><?php echo $a['mat1']; ?></td>
            <td><?php echo $a['mat2']; ?></td>
            <td><?php echo $a['mat3']; ?></td>
            <td><?php echo $a['mat4']; ?></td>

            <!-- Notas de História -->
            <td><?php echo $a['hist1']; ?></td>
            <td><?php echo $a['hist2']; ?></td>
            <td><?php echo $a['hist3']; ?></td>
            <td><?php echo $a['hist4']; ?></td>

            <!-- Notas de Geografia -->
            <td><?php echo $a['geo1']; ?></td>
            <td><?php echo $a['geo2']; ?></td>
            <td><?php echo $a['geo3']; ?></td>
            <td><?php echo $a['geo4']; ?></td>

            <!-- Links para editar ou excluir o aluno -->
            <td>
                <a href="editar.php?id=<?php echo $a['id']; ?>">Editar</a> |
                <a href="excluir.php?id=<?php echo $a['id']; ?>" onclick="return confirm('Tem certeza?')">Excluir</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>
