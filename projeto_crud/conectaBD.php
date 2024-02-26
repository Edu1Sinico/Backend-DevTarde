<?php
// endereco
// nome do BD
// usuario
// senha
$endereco = 'localhost';
$banco = 'postgres';
$adm = 'postgres';
$senha = 'postgres';
try {
    // sgbd:host;port;dbname
    // adm
    // senha
    // errmode
    $pdo = new PDO(
        "pgsql:host=$endereco;port=5432;dbname=$banco",
        $adm,
        $senha,
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );
    echo "Conectado no banco de dados!!! 😭";
    $sql = "CREATE TABLE IF NOT EXISTS usuario(ID SERIAL, NOME VARCHAR(255), DATA_NASCIMENTO VARCHAR(255), TELEFONE VARCHAR(255), EMAIL VARCHAR(255) PRIMARY KEY, SENHA VARCHAR(255))";
    $sql = "CREATE TABLE IF NOT EXISTS anuncio(ID SERIAL PRIMARY KEY, FASE VARCHAR(255), TIPO VARCHAR(255), PORTE VARCHAR(255), SEXO VARCHAR(255), PELAGEM_COR VARCHAR(255), RACA VARCHAR(255), OBSERVACAO VARCHAR(255), EMAIL_USUARIO VARCHAR(255))";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
} catch (PDOException $e) {
    echo "Falha ao conectar ao banco de dados. 😂 <br/>";
    die($e->getMessage());
}
?>