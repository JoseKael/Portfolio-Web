<?php
// Inicia a sessão para verificar se o usuário está logado
session_start();

// Se o usuário não estiver logado, redireciona para o login
if (!isset($_SESSION['logado'])) {
    header("Location: login.php");
    exit;
}
?>
<?php
// Inclui a conexão com o banco de dados
include 'db.php';

// Verifica se o parâmetro "matricula" foi passado pela URL
if (!isset($_GET['matricula'])) {
    echo "<p>Informe uma matrícula válida.</p>";
    exit;
}

// Escapa a entrada da matrícula para evitar SQL Injection
$matricula = mysqli_real_escape_string($conn, $_GET['matricula']);

// Consulta o banco de dados pelo aluno com a matrícula informada
$sql = "SELECT * FROM alunos WHERE matricula = '$matricula'";
$result = mysqli_query($conn, $sql);
$aluno = mysqli_fetch_assoc($result); // Obtém os dados do aluno em formato de array associativo

// Se não encontrar o aluno, exibe mensagem e encerra o script
if (!$aluno) {
    echo "<p>Aluno não encontrado.</p>";
    exit;
}

// Cálculo da média e situação em Português
$media_port = ($aluno['port1'] + $aluno['port2'] + $aluno['port3'] + $aluno['port4']) / 4;
$situacao_port = $media_port >= 6 ? "Aprovado" : "Reprovado";

// Cálculo da média e situação em Matemática
$media_mat = ($aluno['mat1'] + $aluno['mat2'] + $aluno['mat3'] + $aluno['mat4']) / 4;
$situacao_mat = $media_mat >= 6 ? "Aprovado" : "Reprovado";

// Cálculo da média e situação em História
$media_hist = ($aluno['hist1'] + $aluno['hist2'] + $aluno['hist3'] + $aluno['hist4']) / 4;
$situacao_hist = $media_hist >= 6 ? "Aprovado" : "Reprovado";

// Cálculo da média e situação em Geografia
$media_geo = ($aluno['geo1'] + $aluno['geo2'] + $aluno['geo3'] + $aluno['geo4']) / 4;
$situacao_geo = $media_geo >= 6 ? "Aprovado" : "Reprovado";
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Boletim do Aluno</title>
    <link rel="stylesheet" href="style.css"> <!-- Estilo opcional -->
</head>
<body>
    <h1>Boletim do Aluno</h1>

    <!-- Exibe nome e matrícula do aluno -->
    <p><strong>Nome:</strong> <?php echo $aluno['nome']; ?></p>
    <p><strong>Matrícula:</strong> <?php echo $aluno['matricula']; ?></p>

    <!-- Exibe a foto do aluno, se existir -->
    <?php if ($aluno['foto']) { ?>
        <p><img src="uploads/<?php echo $aluno['foto']; ?>" width="100"></p>
    <?php } ?>

    <!-- Tabela com as notas e situações -->
    <table border="1" cellpadding="10">
        <tr>
            <th>Matéria</th>
            <th>Nota 1</th>
            <th>Nota 2</th>
            <th>Nota 3</th>
            <th>Nota 4</th>
            <th>Média</th>
            <th>Situação</th>
        </tr>
        <!-- Linha de Português -->
        <tr>
            <td>Português</td>
            <td><?php echo $aluno['port1']; ?></td>
            <td><?php echo $aluno['port2']; ?></td>
            <td><?php echo $aluno['port3']; ?></td>
            <td><?php echo $aluno['port4']; ?></td>
            <td><?php echo number_format($media_port, 1); ?></td>
            <td><?php echo $situacao_port; ?></td>
        </tr>
        <!-- Linha de Matemática -->
        <tr>
            <td>Matemática</td>
            <td><?php echo $aluno['mat1']; ?></td>
            <td><?php echo $aluno['mat2']; ?></td>
            <td><?php echo $aluno['mat3']; ?></td>
            <td><?php echo $aluno['mat4']; ?></td>
            <td><?php echo number_format($media_mat, 1); ?></td>
            <td><?php echo $situacao_mat; ?></td>
        </tr>
        <!-- Linha de História -->
        <tr>
            <td>História</td>
            <td><?php echo $aluno['hist1']; ?></td>
            <td><?php echo $aluno['hist2']; ?></td>
            <td><?php echo $aluno['hist3']; ?></td>
            <td><?php echo $aluno['hist4']; ?></td>
            <td><?php echo number_format($media_hist, 1); ?></td>
            <td><?php echo $situacao_hist; ?></td>
        </tr>
        <!-- Linha de Geografia -->
        <tr>
            <td>Geografia</td>
            <td><?php echo $aluno['geo1']; ?></td>
            <td><?php echo $aluno['geo2']; ?></td>
            <td><?php echo $aluno['geo3']; ?></td>
            <td><?php echo $aluno['geo4']; ?></td>
            <td><?php echo number_format($media_geo, 1); ?></td>
            <td><?php echo $situacao_geo; ?></td>
        </tr>
    </table>
    <br>

    <!-- Link para voltar à lista principal -->
    <a href="index.php">Voltar</a>
</body>
</html>
