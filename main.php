<?php
// inclusione del file contenente la classe
include "funzioni_mysql.php";
// istanza della classe
$data = new MysqlClass();
// chiamata alla funzione di connessione
$data->connetti();

//To set the password duration for all the users (global), 60 days
$time_expiration = 60;
$data->set_password_expiration_global($time_expiration);

/*************************************************************************************************/

//To set the password duration for the developer user , 30 days
//$single_username = "developer";
//$single_password = "developer";
//$time_expiration_single = 30;
//$data->set_password_expiration_single_username($single_username, $single_password,$time_expiration_single);

/*************************************************************************************************/

?>
