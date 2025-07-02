<?php
// Inclui o arquivo de conexão com o banco de dados
include 'db.php';

// Converte o valor recebido pela URL para inteiro para evitar SQL Injection
$id = intval($_GET['id']);

// Monta o comando SQL para excluir o aluno com o ID informado
$sql = "DELETE FROM alunos WHERE id = $id";

// Executa o comando SQL e verifica se a exclusão foi bem-sucedida
if (mysqli_query($conn, $sql)) {
    // Redireciona de volta para a página inicial após a exclusão
    header('Location: index.php');
} else {
    // Exibe mensagem de erro caso ocorra alguma falha na exclusão
    echo "Erro ao excluir: " . mysqli_error($conn);
}
?>
