<?php
// Inclui o arquivo de conexão com o banco de dados
include 'db.php';

// Pega o ID do aluno do formulário e converte para inteiro (proteção contra SQL Injection)
$id = intval($_POST['id']);

// Recebe os dados do formulário
$matricula = $_POST['matricula'];
$nome = $_POST['nome'];

// Consulta a foto atual do aluno no banco de dados
$sql = "SELECT foto FROM alunos WHERE id = $id";
$result = mysqli_query($conn, $sql);
$aluno = mysqli_fetch_assoc($result);
$foto = $aluno['foto']; // Guarda o nome da foto atual

// Se uma nova foto foi enviada e está válida
if (isset($_FILES['foto']) && $_FILES['foto']['error'] == 0) {
    // Gera um nome único para a nova foto e move para a pasta uploads
    $foto_nome = uniqid() . '_' . $_FILES['foto']['name'];
    move_uploaded_file($_FILES['foto']['tmp_name'], 'uploads/' . $foto_nome);
    $foto = $foto_nome; // Atualiza o nome da foto para salvar no banco
}

// Recebe as notas do formulário
$port1 = $_POST['port1']; $port2 = $_POST['port2']; $port3 = $_POST['port3']; $port4 = $_POST['port4'];
$mat1 = $_POST['mat1']; $mat2 = $_POST['mat2']; $mat3 = $_POST['mat3']; $mat4 = $_POST['mat4'];
$hist1 = $_POST['hist1']; $hist2 = $_POST['hist2']; $hist3 = $_POST['hist3']; $hist4 = $_POST['hist4'];
$geo1 = $_POST['geo1']; $geo2 = $_POST['geo2']; $geo3 = $_POST['geo3']; $geo4 = $_POST['geo4'];

// Monta o SQL de atualização dos dados do aluno
$sql = "UPDATE alunos SET 
            matricula='$matricula', 
            nome='$nome', 
            foto='$foto',
            port1=$port1, port2=$port2, port3=$port3, port4=$port4,
            mat1=$mat1, mat2=$mat2, mat3=$mat3, mat4=$mat4,
            hist1=$hist1, hist2=$hist2, hist3=$hist3, hist4=$hist4,
            geo1=$geo1, geo2=$geo2, geo3=$geo3, geo4=$geo4
        WHERE id=$id";

// Executa a atualização e redireciona se der certo
if (mysqli_query($conn, $sql)) {
    header('Location: index.php'); // Volta para a página inicial
} else {
    // Se der erro, exibe a mensagem do banco
    echo "Erro ao atualizar: " . mysqli_error($conn);
}
?>
