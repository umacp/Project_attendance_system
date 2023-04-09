<?php 
use Dotenv\Dotenv;

require_once __DIR__ . '/../../vendor/autoload.php';

$dotenv = Dotenv::createImmutable(__DIR__ . '/../../');
$dotenv->load();

class Connection{


static function connect(){
    $db_host = $_ENV['DB_HOST'];
    $db_user = $_ENV['DB_USER'];
    $db_pass = $_ENV['DB_PASS'];
    $db_name = $_ENV['DB_NAME'];
    $port = '3306';
    static $conn = null;
    if($conn !== null) {
        return $conn;
    }
    $conn = new mysqli($db_host, $db_user, $db_pass, '', $port);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $conn->query("CREATE DATABASE IF NOT EXISTS $db_name");
    $conn->query("USE $db_name");
    $conn->set_charset("utf8");
    $conn->select_db($db_name);
    return $conn;
}
function close($conn){
    $conn->close();
}
}
?>