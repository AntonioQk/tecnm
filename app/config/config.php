<?php
$conexion = mysqli_connect("localhost", "id19600747_root", "w*tzpS0?ml([{(*P", "id19600747_sistema");


?>

<?php
/**
 * Created by PhpStorm.
 * User: DELL-SYSTEM
 * Date: 01/07/2020
 * Time: 16:41
 */

define('SERVIDOR', 'localhost');
define('USUARIO', 'id19600747_root');
define('PASSWOD', 'w*tzpS0?ml([{(*P');
define('BD', 'id19600747_sistema');

$URL = 'http://localhost/tecnm';

//$URL = 'mysql://utur7aovmczn6qtf:Pp83ju823IBh0nmPhQ9v@bxgvbqru5r7prhsdpnvr-mysql.services.clever-cloud.com:3306/bxgvbqru5r7prhsdpnvr';

$servidor = "mysql:dbname=" . BD . ";host=" . SERVIDOR;

try {
  $pdo = new PDO($servidor, USUARIO, PASSWOD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
  // echo "<script>alert('La conexión a la base de datos fue exitosa.')</script>";
} catch (PDOException $e) {
  echo "<script>alert('Error a la conexión con la base de datos')</script>";
}
?>

<?php
$server = "localhost";
$user = "id19600747_root";
$pass = "w*tzpS0?ml([{(*P";
$bd = "id19600747_sistema";

$conect = new mysqli($server, $user, $pass, $bd);
?>
<?php
$database = "id19600747_sistema";
$user = 'id19600747_root';
$password = 'w*tzpS0?ml([{(*P';


try {

  $con = new PDO('mysql:host=localhost;dbname=' . $database, $user, $password);
} catch (PDOException $e) {
  echo "Error" . $e->getMessage();
}

?>
<?php
try {
  $bdd = new PDO('mysql:host=localhost;dbname=id19600747_sistema;charset=utf8', 'id19600747_root', 'w*tzpS0?ml([{(*P');
} catch (Exception $e) {
  die('Error : ' . $e->getMessage());
}
