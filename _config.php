<?php
/***** CONFIGURAÇÕES DA APLICAÇÃO *****/

// PHP em UTF-8
header('Content-Type: text/html; charset=utf-8');

/* Conexão com o MySQL */

if ($_SERVER['SERVER_NAME'] == 'fuinhas.localhost') {
    
    // Se estou no XAMPP
    $myServer = 'localhost';
    $myUser = 'root';
    $myPass = '';
    $myDatabase = 'fuinhas';
} else {
    
    // Não estou no XAMPP, provavelmente no provedor
    $myServer = '';
    $myUser = '';
    $myPass = '';
    $myDatabase = '';
}

// Conexão ($conn contém a conexão)
$conn = new mysqli ($myServer, $myUser, $myPass, $myDatabase);

// Em caso de erro
if ($conn->connect_error) die("Falha de conexão com o banco e dados: " . $conn->connect_error);

// Transações MySQL em UTF-8
$conn->query("SET NAMES 'utf8'");
$conn->query('SET character_set_connection=utf8');
$conn->query('SET character_set_client=utf8');
$conn->query('SET character_set_results=utf8');

// MySQL com nomes de dias da semana e meses em português
$conn->query('SET GLOBAL lc_time_names = pt_BR');
$conn->query('SET lc_time_names = pt_BR');

/* Configurações das páginas do site */

// Lê o conteúdo da tabela 'config'
$sql = "SELECT * FROM config";
$res = $conn->query($sql);

while($data = $res->fetch_assoc()) {

    if(substr($data['var'], 0, 7) == 'social_') {
        $var = str_ireplace('social_', '', $data['var']);
        $T['social_'][$var] = $data['val'];
    } else {
        $T[$data['var']] = $data['val'];
    }

}
