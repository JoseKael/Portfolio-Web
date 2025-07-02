<?php
// Inicia a sessão para poder manipulá-la
session_start();

// Destroi todos os dados da sessão atual (desloga o usuário)
session_destroy();

// Redireciona o usuário para a página de login após o logout
header("Location: login.php");

// Encerra a execução do script para garantir que nada mais será processado
exit;
?>