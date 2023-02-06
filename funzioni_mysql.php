<?php
class MysqlClass
{
// parametri per la connessione al database
public $nomehost = "192.168.25.127:32306";
public $nomeuser = "root";
public $password = "dflight";
public $database = "";
// controllo sulle connessioni attive
private $attiva = false;
// funzione per la connessione a MySQL
public function connetti()
{
if(!$this->attiva)
{
$connessione = mysql_connect($this->nomehost,$this->nomeuser,$this->password);
echo "mysql connection is successful!\n";

}else{
echo "mysql connection is not successful!\n";
return true;
}
}
//setup password expiration
public function set_password_expiration_global($time_expiration){
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$mysqli = new mysqli($this->nomehost, $this->nomeuser, $this->password, $this->database);

$mysqli->query("SET GLOBAL default_password_lifetime = {$time_expiration}");
echo "a global password expiration of {$time_expiration} days has been set!\n";

}

//setup password expiration for a single username
public function set_password_expiration_single_username($single_username, $single_password,$time_expiration){
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$mysqli = new mysqli($this->nomehost, $single_username, $single_password, $this->database);

$mysqli->query("ALTER USER '{$single_username}'@'{$nomehost}' PASSWORD EXPIRE INTERVAL {$time_expiration} DAY");

echo "The password expiration for user {$single_username} has been set to {$time_expiration} days!\n";

}

}
?>
