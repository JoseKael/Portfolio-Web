<?php
// Inclui o arquivo de conexão com o banco de dados
include 'db.php';

// Recebe os dados do formulário (método POST)
$matricula = $_POST['matricula']; // Recebe a matrícula do aluno
$nome = $_POST['nome'];           // Recebe o nome do aluno
$foto = '';                       // Inicializa a variável que vai guardar o nome da foto (se houver)

// Verifica se uma foto foi enviada e se não houve erro no upload
if (isset($_FILES['foto']) && $_FILES['foto']['error'] == 0) {
    // Cria um nome único para a foto (evita sobrescrever arquivos com o mesmo nome)
    $foto_nome = uniqid() . '_' . $_FILES['foto']['name'];
    // Move a foto do diretório temporário para a pasta "uploads"
    move_uploaded_file($_FILES['foto']['tmp_name'], 'uploads/' . $foto_nome);
    // Salva o nome da foto na variável $foto
    $foto = $foto_nome;
}

// Recebe as notas de Português
$port1 = $_POST['port1'];
$port2 = $_POST['port2'];
$port3 = $_POST['port3'];
$port4 = $_POST['port4'];

// Recebe as notas de Matemática
$mat1 = $_POST['mat1'];
$mat2 = $_POST['mat2'];
$mat3 = $_POST['mat3'];
$mat4 = $_POST['mat4'];

// Recebe as notas de História
$hist1 = $_POST['hist1'];
$hist2 = $_POST['hist2'];
$hist3 = $_POST['hist3'];
$hist4 = $_POST['hist4'];

// Recebe as notas de Geografia
$geo1 = $_POST['geo1'];
$geo2 = $_POST['geo2'];
$geo3 = $_POST['geo3'];
$geo4 = $_POST['geo4'];

// Monta o comando SQL para inserir os dados na tabela "alunos"
$sql = "INSERT INTO alunos (
            matricula, nome, foto, 
            port1, port2, port3, port4,
            mat1, mat2, mat3, mat4, 
            hist1, hist2, hist3, hist4, 
            geo1, geo2, geo3, geo4
        )
        VALUES (
            '$matricula', '$nome', '$foto', 
            $port1, $port2, $port3, $port4, 
            $mat1, $mat2, $mat3, $mat4, 
            $hist1, $hist2, $hist3, $hist4, 
            $geo1, $geo2, $geo3, $geo4
        )";

// Executa a consulta SQL e verifica se deu certo
if (mysqli_query($conn, $sql)) {
    // Se inseriu com sucesso, redireciona para a página inicial (lista de alunos)
    header('Location: index.php');
} else {
    // Se houve erro na inserção, exibe o erro na tela
    echo "Erro ao cadastrar: " . mysqli_error($conn);
}
?>
