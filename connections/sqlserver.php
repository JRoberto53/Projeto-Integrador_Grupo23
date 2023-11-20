<?php
 
try
{
 
    $servidor = "GAMER";
    $instancia = "SQLEXPRESS";
    $porta = 1433;
    $database = "Grupo_23_II";
    $usuario = "sa";
    $senha = "415263";
    
    $conexao = new PDO( "sqlsrv:Server={$servidor}\\{$instancia},{$porta};Database={$database}", $usuario, $senha );
}
catch ( PDOException $e )
{
    echo "Drivers disponiveis: " . implode( ",", PDO::getAvailableDrivers() );
    echo "\nErro: " . $e->getMessage();
    exit;
}
 
//$query = $conexao->prepare( "select @@version" );
//$query->execute();
 
//$resultado = $query->fetchAll();
 
//echo $resultado['0']['0'];
 
//unset( $conexao );
//unset( $query );
?>